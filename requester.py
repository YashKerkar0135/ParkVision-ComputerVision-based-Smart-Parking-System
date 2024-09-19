import requests

response = requests.get('http://localhost:8080/get_booked_slot')
data = response.json()
booked_slot = data['booked_slot']
# print("Current booked slot:", booked_slot)
