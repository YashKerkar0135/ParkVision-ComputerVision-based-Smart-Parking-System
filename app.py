from flask import Flask, request, jsonify
from flask_cors import CORS

app = Flask(__name__)
CORS(app)  

booked_slot = None  

@app.route('/log_button_id', methods=['POST'])
def log_button_id():
    global booked_slot  
    data = request.get_json()  
    if data is None or 'button_id' not in data:
        return jsonify({'error': 'Invalid JSON or missing button_id'}), 400
    
    button_id = data['button_id']
    booked_slot = button_id  
    print("Clicked button ID:", button_id)

    return jsonify({'button_id': button_id}), 200

@app.route('/get_booked_slot', methods=['GET'])
def get_booked_slot():
    global booked_slot
    return jsonify({'booked_slot': booked_slot}), 200

@app.after_request
def print_booked_slot(response):
    global booked_slot
    return response

if __name__ == '__main__':
    app.run(debug=True, host='localhost', port=8080)
