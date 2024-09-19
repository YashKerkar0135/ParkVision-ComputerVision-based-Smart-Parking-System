import cv2
import pickle
import cvzone
import numpy as np
import requests

response = requests.get('http://localhost:8080/get_booked_slot')
data = response.json()
booked_slot = data['booked_slot']

width, height = 130, 55

cap = cv2.VideoCapture('car_parking_vidio.mp4')

poslist = []

try:
    with open('CarParkPos', 'rb') as f:
        poslist = pickle.load(f)
except:
    poslist = []
    
def checkParkingSpace(imgPro):
    spaceCounter = 0

    for pos in poslist:
        x, y = pos

        imgCrop = imgPro[y:y + height, x:x + width]
        count = cv2.countNonZero(imgCrop)


        if count < 900:
            color = (0, 255, 0)
            thickness = 5
            spaceCounter += 1
        else:
            color = (0, 0, 255)
            thickness = 3

        cv2.rectangle(img, pos, (pos[0] + width, pos[1] + height), color, thickness)
        cvzone.putTextRect(img, str(count), (x, y + height - 3), scale=1, thickness=2, offset=0, colorR=color)

    cvzone.putTextRect(img, f'We have : {spaceCounter} parking available & {len(poslist)} parked cars.', (100, 50), scale=2, thickness=5, offset=30, colorR=(128, 128, 128), font = cv2.FONT_HERSHEY_SIMPLEX)
while True:
    
    if cap.get(cv2.CAP_PROP_POS_FRAMES) == cap.get(cv2.CAP_PROP_FRAME_COUNT):
        cap.set(cv2.CAP_PROP_POS_FRAMES, 0)
    success, img = cap.read()
    for pos in poslist:
        cv2.rectangle(img, pos, (pos[0] + width, pos[1] + height), (255, 0, 255), 3)
    cv2.rectangle(img, (150, 250), (280, 815), (255, 255, 255), 3)
    cv2.rectangle(img, (570, 250), (870, 570), (255, 255, 255), 3)
    cv2.rectangle(img, (1035, 190), (1300, 500), (255, 255, 255), 3)
    cv2.rectangle(img, (1040, 1250), (1320, 1540), (255, 255, 255), 3)
    cv2.rectangle(img, (1920, 210), (2180, 480), (255, 255, 255), 3)
    cv2.rectangle(img, (150, 2075), (440, 1260), (255, 255, 255), 3)
    cv2.rectangle(img, (2800, 1080), (3070, 1320), (255, 255, 255), 3)
    

    if booked_slot == 'id1':
        cv2.rectangle(img, (3250, 1075), (3250 + width, 1075 + height), (0, 255, 0), 2)
    else:
        cv2.rectangle(img, (3250, 1075), (3250 + width, 1075 + height), (0, 0, 255), 2)
    
    if booked_slot == 2:
        cv2.rectangle(img, (3250, 1138), (3250 + width, 1138 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3250, 1138), (3250 + width, 1138 + height), (0, 255, 0), 2)
    
    if booked_slot == 'id3':
        cv2.rectangle(img, (3250, 1200), (3250 + width, 1200 + height), (0, 255, 0), 2)
    else:
        cv2.rectangle(img, (3250, 1200), (3250 + width, 1200 + height), (0, 0, 255), 2)
        
    if booked_slot == 4:
        cv2.rectangle(img, (3250, 1260), (3250 + width, 1260 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3250, 1260), (3250 + width, 1260 + height), (0, 255, 0), 2)
        
    if booked_slot == 5:
        cv2.rectangle(img, (3250, 1320), (3250 + width, 1320 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3250, 1320), (3250 + width, 1320 + height), (0, 255, 0), 2)
        
    if booked_slot == 6:
        cv2.rectangle(img, (3250, 1380), (3250 + width, 1380 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3250, 1380), (3250 + width, 1380 + height), (0, 255, 0), 2)
        
    if booked_slot == 'id7':
        cv2.rectangle(img, (3250, 1440), (3250 + width, 1440 + height), (0, 255, 0), 2)
    else:
        cv2.rectangle(img, (3250, 1440), (3250 + width, 1440 + height), (0, 0, 255), 2)
        
    if booked_slot == 8:
        cv2.rectangle(img, (3250, 1500), (3250 + width, 1500 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3250, 1500), (3250 + width, 1500 + height), (0, 255, 0), 2)
        
    if booked_slot == 9:
        cv2.rectangle(img, (3250, 1560), (3250 + width, 1560 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3250, 1560), (3250 + width, 1560 + height), (0, 255, 0), 2)
        
    if booked_slot == 10:
        cv2.rectangle(img, (3250, 1620), (3250 + width, 1620 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3250, 1620), (3250 + width, 1620 + height), (0, 255, 0), 2)
        
    if booked_slot == 11:
        cv2.rectangle(img, (3250, 1680), (3250 + width, 1680 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3250, 1680), (3250 + width, 1680 + height), (0, 255, 0), 2)
            
    if booked_slot == 'id12':
        cv2.rectangle(img, (3250, 1740), (3250 + width, 1740 + height), (0, 255, 0), 2)
    else:
        cv2.rectangle(img, (3250, 1740), (3250 + width, 1740 + height), (0, 0, 255), 2)
        

    
    
    if booked_slot == 13:
        cv2.rectangle(img, (3439, 1075), (3439 + width, 1075 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3439, 1075), (3439 + width, 1075 + height), (0, 255, 0), 2)
    
    if booked_slot == 14:
        cv2.rectangle(img, (3439, 1138), (3439 + width, 1138 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3439, 1138), (3439 + width, 1138 + height), (0, 255, 0), 2)
        
    if booked_slot == 15:
        cv2.rectangle(img, (3439, 1200), (3439 + width, 1200 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3439, 1200), (3439 + width, 1200 + height), (0, 255, 0), 2)
        
    if booked_slot == 16:
        cv2.rectangle(img, (3439, 1260), (3439 + width, 1260 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3439, 1260), (3439 + width, 1260 + height), (0, 255, 0), 2)
        
    if booked_slot == 17:
        cv2.rectangle(img, (3439, 1320), (3439 + width, 1320 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3439, 1320), (3439 + width, 1320 + height), (0, 255, 0), 2)
        
    if booked_slot == 18:
        cv2.rectangle(img, (3439, 1380), (3439 + width, 1380 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3439, 1380), (3439 + width, 1380 + height), (0, 255, 0), 2)
        
    if booked_slot == 19:
        cv2.rectangle(img, (3439, 1440), (3439 + width, 1440 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3439, 1440), (3439 + width, 1440 + height), (0, 255, 0), 2)
        
    if booked_slot == 20:
        cv2.rectangle(img, (3439, 1500), (3439 + width, 1500 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3439, 1500), (3439 + width, 1500 + height), (0, 255, 0), 2)
        
    if booked_slot == 'id21':
        cv2.rectangle(img, (3439, 1560), (3439 + width, 1560 + height), (0, 255, 0), 2)
    else:
        cv2.rectangle(img, (3439, 1560), (3439 + width, 1560 + height), (0, 0, 255), 2)
        
    if booked_slot == 22:
        cv2.rectangle(img, (3439, 1620), (3439 + width, 1620 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3439, 1620), (3439 + width, 1620 + height), (0, 255, 0), 2)
        
    if booked_slot == 23:
        cv2.rectangle(img, (3439, 1680), (3439 + width, 1680 + height), (0, 0, 255), 2)
    else:
        cv2.rectangle(img, (3439, 1680), (3439 + width, 1680 + height), (0, 255, 0), 2)
        
    if booked_slot == 'id24':
        cv2.rectangle(img, (3439, 1740), (3439 + width, 1740 + height), (0, 255, 0), 2)
    else:
        cv2.rectangle(img, (3439, 1740), (3439 + width, 1740 + height), (0, 0, 255), 2)
    
  
    
    imgGray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    imgBlur = cv2.GaussianBlur(imgGray, (3, 3), 1)
    imgThreshold = cv2.adaptiveThreshold(imgBlur, 255, cv2.ADAPTIVE_THRESH_GAUSSIAN_C, cv2.THRESH_BINARY_INV, 25, 16)
    imgMedian = cv2.medianBlur(imgThreshold, 5)
    kernel = np.ones((3, 3), np.uint8)
    imgDilate = cv2.dilate(imgMedian, kernel, iterations=1)

    checkParkingSpace(imgDilate)
    
    cv2.namedWindow("Image", cv2.WINDOW_NORMAL)
    cv2.resizeWindow("Image", 1200, 800)  
    cv2.moveWindow("Image", 0, 0)
    cv2.imshow("Image", img)
    cv2.setWindowProperty("Image", cv2.WND_PROP_FULLSCREEN, cv2.WINDOW_FULLSCREEN)
    cv2.waitKey(1)

