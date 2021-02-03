"""
Demonstration of the GazeTracking library.
Check the README.md for complete documentation.
"""

import cv2
from gaze_tracking import GazeTracking
from flask import jsonify,request
from flask_cors import CORS, cross_origin
import flask

app = flask.Flask(__name__)
app.config["DEBUG"] = True

@app.route('/getEyeMovements', methods=['GET'])
@cross_origin()
def getEyeResults():
    gaze = GazeTracking()
    frame = cv2.imread("./images/analysis/proctor.png")
    gaze.refresh(frame)
    frame = gaze.annotated_frame()
    text = ""

    if gaze.is_blinking():
        text = "Blinking"
    elif gaze.is_right():
        text = "Looking right"
    elif gaze.is_left():
        text = "Looking left"
    elif gaze.is_center():
        text = "Looking center"
    print(text)
    return text

app.run(host='127.0.0.1', port=7000, debug=True)

    