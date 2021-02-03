import flask
import json
import base64
from PIL import Image
from io import BytesIO
import re
import csv

from flask import jsonify,request
import boto3
from flask_cors import CORS, cross_origin

app = flask.Flask(__name__)
app.config["DEBUG"] = True


def checkKey(dict, key): 
      
    if key in dict: 
        return True
    else: 
        return False




def convert_and_save(b64_string):
    with open("imageToSave.png", "wb") as fh:
        fh.write(base64.decodebytes(b64_string.encode()))


def checkImages():
    with open("credentials.csv",'r') as input:
        next(input)
        reader = csv.reader(input)
        for line in reader:
            access_key_id = line[2]
            secret_access_key = line[3]

    current = './images/current.png'
    old = './images/test.jpg'
    client = boto3.client("rekognition",
                        aws_access_key_id = access_key_id,
                        aws_secret_access_key = secret_access_key,
                        region_name='us-west-2' )

    with open(current,'rb') as source_image:
        source_bytes = source_image.read()

    with open(old,'rb') as target_image:
        target_bytes = target_image.read()

    # response = client.detect_labels(Image={'Bytes':source_bytes},MaxLabels=10)
    # print(response)
    #print(source_bytes)
    print("----------------------------")
    response = client.compare_faces(
        SourceImage={'Bytes':source_bytes},
        TargetImage={'Bytes':target_bytes})

    # print(reponse)
    # data = json.loads(reponse)
    # print(data['FaceMatches']['Similarity'])
    # for key,value in response.items():
    #     if key in ('FaceMatches','UnmatchedFaces') :
    #         print(key)
    #         for att in value:
    #             print(att)
    response = str(response)
    response = response.replace("'", '"')
    response = json.loads(response)
    for doc in response['FaceMatches']:
        res = float(doc['Similarity'])
    if res > 90 :
        return True
    else:
        return False


def checkMultiFaces():
    with open("credentials.csv",'r') as input:
        next(input)
        reader = csv.reader(input)
        for line in reader:
            access_key_id = line[2]
            secret_access_key = line[3]

    current = "./images/analysis/proctor.png"  
    #str(count)
    old = './images/test.jpg'
    client = boto3.client("rekognition",
                        aws_access_key_id = access_key_id,
                        aws_secret_access_key = secret_access_key,
                        region_name='us-west-2' )

    with open(current,'rb') as source_image:
        source_bytes = source_image.read()

    with open(old,'rb') as target_image:
        target_bytes = target_image.read()

    # response = client.detect_labels(Image={'Bytes':source_bytes},MaxLabels=10)
    # print(response)
    #print(source_bytes)
    print("----------------------------")
    response = client.compare_faces(
        SourceImage={'Bytes':source_bytes},
        TargetImage={'Bytes':target_bytes})

    # print(reponse)
    # data = json.loads(reponse)
    # print(data['FaceMatches']['Similarity'])
    # for key,value in response.items():
    #     if key in ('FaceMatches','UnmatchedFaces') :
    #         print(key)
    #         for att in value:
    #             print(att)
    Unmatched_count = len(response['UnmatchedFaces'])
    response = str(response)
    response = response.replace("'", '"')
    response = json.loads(response)
    
    for doc in response['UnmatchedFaces']:
        Unmatched_count = Unmatched_count + 1
    
    if Unmatched_count > 0:
        return {"Multiple_Faces":"True"}

    face_auth = ""
    mouth_open_val = ""
    mouth_open_conf = 0.0
    mobile = ""
    Multiple_faces = "" #if this else wont check
    yaw = 0.0
    roll = 0.0
    pitch = 0.0

    for doc in response['FaceMatches']:
        res = float(doc['Similarity'])

    pose_list = ""
    # for doc in response['FaceMatches']:
        # print(response['FaceMatches'])
        # for pose in doc['Pose']:#  pose_list = doc['pose']
        #     yaw = float(pose['Yaw'])
        #     roll = float(pose['Roll'])
        #     pitch = float(pose['Pitch'])

    if res > 90 :
         face_auth = "True"
    else:
        face_auth = "False"


    response_detect_face = client.detect_faces(Image={'Bytes':source_bytes},Attributes = ['ALL'])
    response_obj = client.detect_labels(Image={'Bytes':source_bytes},MaxLabels=10)
    # print("------face_detect-----")
    # print(response_detect_face['FaceDetails'])
    # print("------obj detect------")
    # print(response_obj)
    # response_detect_face = str(response_detect_face)
    # response_detect_face = response_detect_face.replace("'", '"')
    # response_detect_face = json.loads(response_detect_face)
    mouth_open_val = str(response_detect_face['FaceDetails'][0]['MouthOpen']['Value'])
    mouth_open_conf = float(response_detect_face['FaceDetails'][0]['MouthOpen']['Confidence'])
    yaw = float(response_detect_face['FaceDetails'][0]['Pose']['Yaw'])
    roll = float(response_detect_face['FaceDetails'][0]['Pose']['Roll'])
    pitch = float(response_detect_face['FaceDetails'][0]['Pose']['Pitch'])

    # response_obj = str(response_obj)
    # response_obj.lower()
    print(response_obj)
    obj_list = []
    for i in range (0,5):
        obj_list.append(str(response_obj['Labels'][i]['Name']).lower())

    if "mobile phone" in obj_list or "Cellphone" in obj_list or "phone" in obj_list:
        mobile = "True"
    else:
        mobile = "False"

    # print(obj_list)


    # if response_obj.find("mobile phone") != -1 or response_obj.find("cellphone"):
    #     mobile = "True"
    # else:
    #     mobile = "False"

    

    # response_obj = response_obj.replace("'", '"')
    # response_obj = json.loads(response_obj)

    # for doc in response_detect_face['FaceDetails']:
    #     for mouth_res in doc['MouthOpen']:
    #         mouth_open_val = str(mouth_res['Value'])
    #         mouth_open_conf = float(mouth_res['Confidence'])

    return {"face_auth":face_auth,
                    "mouth_open_val" : mouth_open_val,
                    "mouth_open_conf" : mouth_open_conf,
                    "phone" : mobile,
                    "yaw" : yaw,
                    "pitch" : pitch,
                    "roll" : roll
                    }


    
    

    
    


# @app.route('/face_auth_', methods=['POST','GET'])
# @cross_origin()
# def home():
#     print("sdf")
#     # for arg in request.args:
#     #     print(str(arg))
#     data = json.loads(request.data)
#     convert_and_save(data['image'])
#     return jsonify({"result":"True"})

# @app.route('/face_auth', methods=['POST', 'OPTIONS'])
# @cross_origin()
# def post_data():
#     if request.method == 'OPTIONS':
#         headers = {
#             'Access-Control-Allow-Origin': '*',
#             'Access-Control-Allow-Methods': 'POST, GET, OPTIONS',
#             'Access-Control-Max-Age': 1000,
#             'Access-Control-Allow-Headers': 'origin, x-csrftoken, content-type, accept',
#         }
#         return '', 200, headers
#     data = json.loads(request.data)
#     # print(data)
    




#     convert_and_save(data['image'])
#     return jsonify({'result': 'true'}), 201





@app.route('/process_image', methods=['post'])
@cross_origin()
def process_image():
    data = request.get_json()
    image_data = re.sub('^data:image/.+;base64,', '', data['image'])
    im = Image.open(BytesIO(base64.b64decode(image_data)))
    im.save('./images/current.png')
    if checkImages():
        return jsonify({"result":"True"})
    else: 
        return jsonify({"result":"False"})

@app.route('/process_image_real', methods=['post'])
@cross_origin()
def process_image_real():
    data = request.get_json()
    image_data = re.sub('^data:image/.+;base64,', '', data['image'])
    # count = count + 1
    im = Image.open(BytesIO(base64.b64decode(image_data)))
    im.save('./images/analysis/proctor.png')
    print("request received")
    try:
        res = checkMultiFaces()
    except:
        res = jsonify({"face_auth":"False",
                    "mouth_open_val" : "False",
                    "mouth_open_conf" : 0.0,
                    "phone" : "False",
                    "yaw" : 0.0,
                    "pitch" : 0.0,
                    "roll" : 0.0
                    })
        return res
    print(res)
    # if checkMultiFaces():
    #     return jsonify({"result":"True"})
    # else: 
    #     return jsonify({"result":"False"})

    # if checkKey(res,"Multiple_Faces") :
    return jsonify(res)
    # else
    

app.run(host='127.0.0.1', port=5000, debug=True)