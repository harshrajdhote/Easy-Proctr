@app.route('/upload', methods=['POST']) 
def upload_base64_file(): 
    """ 
        Upload image with base64 format and get car make model and year 
        response 
    """

  data = request.get_json()
  # print(data)

  if data is None:
      print("No valid request body, json missing!")
      return jsonify({'error': 'No valid request body, json missing!'})
  else:

      img_data = data['img']

      # this method convert and save the base64 string to image
      convert_and_save(img_data)




def convert_and_save(b64_string):

    b64_string += '=' * (-len(b64_string) % 4)  # restore stripped '='s

    string = b'{b64_string}'

    with open("tmp/imageToSave.png", "wb") as fh:
        fh.write(base64.decodebytes(string))
i