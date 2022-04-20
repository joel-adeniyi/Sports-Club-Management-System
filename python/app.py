import io
import matplotlib
import numpy as np
matplotlib.use('pdf')
from matplotlib import pyplot as plt
import sqlalchemy
from flask import Flask, send_file

# Database constants.
DATABASE_USER_NAME = 'root'
DATABASE_HOST = 'localhost:3306'
DATABASE_NAME = 'fms'
PLAYER_TABLE_NAME = 'players'
PLAYER_NAME_COLUMN_NAME = 'name'
PLAYER_ID_COLUMN_NAME = 'id'
STATISTICS_TABLE_NAME = 'statistics'
STATISTICS_PLAYER_ID_COLUMN_NAME = 'player_id'


# Drawing constants.
CSS4_COLOR_NAMES = ['rosybrown', 'lightcoral', 'tomato', 'goldenrod', 'olive', 'seagreen', 'teal', 'deepskyblue', 'royalblue', 'darkorchid', 'plum', 'orchid', 'hotpink', 'crimson']
LABELS = {
  'goals_scored': ('Goals', 'Number of Goals Scored'),
  'goals_conceded': ('Goals', 'Number of Goals Conceded'),
  'assists': ('Assists', 'Number of Assists'),
  'shots_taken': ('Shots Taken', 'Most Amount of Shots Taken'),
  'shots_missed': ('Shots Missed', 'Most Amount of Shots Missed'),
  'red_cards': ('Red Cards', 'Number of Red Cards'),
  'yellow_cards': ('Yellow Cards', 'Number of Yellow Cards'),
  'games_played': ('Games Played', 'Number of Games Played'),
}

# Global variables.
engine = sqlalchemy.create_engine(f'mysql+pymysql://{DATABASE_USER_NAME}@{DATABASE_HOST}/{DATABASE_NAME}')
connection = engine.connect()
app = Flask(__name__)

# API.
@app.route("/report/<statistics_name>")
def generate_report(statistics_name):
  # Query data from database.
  try:
    data = connection.execute(f'''
      select {PLAYER_TABLE_NAME}.{PLAYER_NAME_COLUMN_NAME}, {STATISTICS_TABLE_NAME}.{statistics_name}
      from {PLAYER_TABLE_NAME}
      join {STATISTICS_TABLE_NAME} on {PLAYER_TABLE_NAME}.{PLAYER_ID_COLUMN_NAME}={STATISTICS_TABLE_NAME}.{STATISTICS_PLAYER_ID_COLUMN_NAME}
      order by {statistics_name} asc
      
    ''')
  except sqlalchemy.exc.SQLAlchemyError as e:
    return str(e), 400

  # Convert to lists.
  names = []
  values = []
  colors = []
  max_value = 0
  for i, (name, value) in enumerate(data):
    names.append(name)
    values.append(value)
    colors.append(matplotlib.colors.CSS4_COLORS[CSS4_COLOR_NAMES[i % len(CSS4_COLOR_NAMES)]])
    max_value = max(value, max_value)

  
  # Draw.
  plt.figure()
  plt.barh(names, values, color=colors)
  (xlabel, title) = LABELS.get(statistics_name, (statistics_name, 'Player'))
  plt.xlabel(xlabel)
  plt.xticks(np.arange(0, max_value, 5)) 
  
  plt.title(title)
  for i, value in enumerate(values):
    plt.text(value + max_value * 0.01, i - 0.15, str(value), fontsize=6)

  


  # Generate PDF.
  file = io.BytesIO()
  plt.savefig(file, format='pdf', bbox_inches='tight')
  file.seek(0)

  # Send response.
  return send_file(
    file,
    as_attachment=True,
    download_name=f'{statistics_name}.pdf',
    mimetype='application/pdf'
  )

if __name__ == "__main__":
    app.run()