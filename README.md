# 🚗 ParkVision – Computer Vision-based Smart Parking System

ParkVision is a smart parking system that uses **OpenCV** and **Python** to detect vacant and occupied parking spaces in real-time from an input video or image feed. This project simulates how AI and computer vision can be used to make parking systems smarter, more efficient, and less frustrating.

---

## 🧠 Problem Statement

In today’s urban cities, finding a parking spot is a major challenge. Traditional parking systems do not offer real-time availability insights. ParkVision aims to solve this problem by using **Computer Vision** to:
- Detect and monitor multiple parking spaces
- Identify available and occupied slots from a video feed
- Provide a visual interface with marked statuses

---

## 📌 Features

- 🎥 Video feed-based slot detection
- 🟩 Real-time parking availability detection
- 🔳 Configurable parking space slots using `ParkingPos`
- 🧠 OpenCV-based image processing and contour detection
- 🖼️ Visual display showing green (vacant) and red (occupied) slots
- 📝 Save/load predefined slot positions

---

## 🛠️ Tech Stack

| Technology | Purpose |
|------------|---------|
| Python     | Programming Language |
| OpenCV     | Image Processing |
| NumPy      | Numerical Computation |
| Pickle     | Slot position data storage |

---

## 🗂️ Project Structure
ParkVision/
├── carPark.mp4 # Sample parking video
├── ParkingPos # File to save slot positions
├── slotDetector.py # Main logic to detect empty/occupied slots
├── AddParkingSlotPosition.py # Script to draw slot positions manually


---

## ▶️ How It Works

1. Use **`AddParkingSlotPosition.py`** to define your parking slots on a sample frame
2. Slot coordinates are saved using Python's `pickle` module
3. Run **`slotDetector.py`** to analyze the video (`carPark.mp4`) and:
   - Crop each slot from the frame
   - Apply preprocessing (blur, threshold, etc.)
   - Count white pixels to determine if a slot is occupied
   - Draw green/red rectangles to show status

---

## 🧪 How to Run Locally

### ✅ Prerequisites
- Python 3.x
- Libraries: `opencv-python`, `numpy`

### 📦 Installation

```bash
pip install opencv-python numpy





