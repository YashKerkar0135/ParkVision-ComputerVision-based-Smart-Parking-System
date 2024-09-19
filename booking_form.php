<?php  

include 'connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="booking_form.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Booking Form</title>
    <script>
        function bookSlot(slot) {
            var buttonId = slot;
            
            // Send the button ID to the server for logging
            fetch('http://localhost:8080/log_button_id', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ button_id: buttonId })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                console.log(data); // Log any response from the server
            })
            .catch(error => {
                console.error('There was an error!', error);
            });
        }
    </script>
</head>
<style>
    .btn {
      position: relative;
      width: 7em;
      height: 7em;
      border-radius: 50%;
      outline: none;
      border:4px #3b3838 solid;
      background: linear-gradient(
       145deg, #171717, #444245
      );
      box-shadow: insert 2px 2px 0px #7d7c7e,
        insert -2px -2px 0px #1c1c1c;
      color: #a6a6a6;
      }
  
      .btn span {
        font-size: 0.9em;
      }
      
      .btn::before {
        content: "";
        position:absoluate;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: inherit;
        background: linear-gradient(
          145deg, #262626, #606060
        );
        width: 7.25em;
        height: 7.25em;
        z-index: -1;
      box-shadow: 11px 11px 22px #141414,
                   -11px -px 22px #525252;
      }
  
  
      .button-clicked{
        background: linear-gradient(
          -185deg, #131313, #444245
        );
        box-shadow: insert -2px -2px 0px #5e5e5e,
          insert 2px 2px 0px #1c1c1c;
      }
  
      .icon-clicked {
        color: #fff;
        text-shadow: 0px 0px 15px #008ECE;
      }

    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1); /* Invert the color to white */
    }
  
</style>
<body class="main_bg"style="position:relative;top:240px">
    <div class="form">
        <div class="form-text">
            <h1><span><img src="art-1.png" alt=""></span>Book Now <span><img src="art-1.png" alt=""></span></h1>
            <p>Reserve your parking spot now for convenient vehicle storage.</p>
        </div>
        <div class="main-form">
            <form method="post" onsubmit="return validateDates()">
                <div>
                    <span>Enter your Full Name:</span>
                    <input type="text" name="name" id="name" placeholder="Enter your name here..." required>
                </div>
                <div>
                    <span>Enter your Email Address:</span>
                    <input type="email" name="email" id="email" placeholder="Enter your email here..." required>
                </div>
                <div>
                    <span>Gender:</span>
                    <select style="background:black" name="gender" id="gender" required>
                        <option value=""><---Select---></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div>
                    <span>Date of Birth:</span>
                    <input type="date" name="txtDate0" id="txtDate0" placeholder="date" required>
                    <script>    
                     var today = new Date().toISOString().split('T')[0];
            document.getElementById("txtDate0").setAttribute('max', today);

            document.getElementById("txtDate0").addEventListener("change", function() {
                var selectedDate = new Date(this.value);

                var minDate = new Date();
                minDate.setFullYear(minDate.getFullYear() - 18);

                if (selectedDate > minDate) {
                    alert("You must be at least 18 years old to book parking.");
                    this.value = "";
                }
            }); 
                    </script>
                </div>
                <div>
                    <span>Residency status:</span>
                    <select style="background:black" name="status" id="status" required>
                        <option value=""><---Select---></option>
                        <option value="Own">Own</option>
                        <option value="Rent">Rent</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div>
                    <span>Registration Plate Number:</span>
                    <input type="text" name="plate" id="plate" placeholder="Registration Plate Number ..." pattern="[A-Z0-9]{1,10}" required>
                </div>
                <div>
                    <span>Phone number:</span>
                    <input type="tel" name="number" id="number" pattern="[0-9]{10}" title="Please enter a 10-digit number" placeholder="Enter your phone number here..." maxlength="10" required>
                </div>
                <div>
                    <span>Vehicle Model:</span>
                    <input type="text" name="model" id="model" placeholder="Enter your Vehicle Model here...." required>
                </div>
                <div>
                    <span>Duration:</span><br>
                    <label style="color:white; font-family: 'Akaya Telivigala', cursive;">Start Date:</label>
                    <input type="date" name="txtDate1" id="txtDate1" required="Required" class="form-control" name="startDate" placeholder="Select suitable date" />
                </div>
                <div>
                    <label style="color: white; font-family: 'Akaya Telivigala', cursive;">End Date:</label>
                    <input type="date" name="txtDate2" id="txtDate2" required="Required" class="form-control" name="endDate" placeholder="Select suitable date" />
                </div>
                <div>
                    <span>Select your preferred parking spot.</span>
                </div>
                <br>
                
        <section style="position:relative;left:40px">        
        <button class="btn" id="parkingSpot1" data-spot="1" onclick="alert('Car is already occupied...')">
        <span class="material-icons-outlined">
          1
        </span>
      </button>
      <button class="btn" id="parkingSpot2" data-spot="2" onclick="bookSlot(2)">
        <span class="matrial-icons-outlined">
          2
        </span>
      </button>
      <button class="btn" id="parkingSpot3" data-spot="3" onclick="alert('Car is already occupied...')">
        <span class="matrial-icons-outlined">
          3
        </span>
      </button>
      <button class="btn" id="parkingSpot4" data-spot="4" onclick="bookSlot(4)">
        <span class="matrial-icons-outlined">
          4
        </span>
      </button>
      <button class="btn" id="parkingSpot5" data-spot="5" onclick="bookSlot(5)">
        <span class="matrial-icons-outlined">
          5
        </span>
      </button>
      <button class="btn" id="parkingSpot6" data-spot="6" onclick="bookSlot(6)">
        <span class="matrial-icons-outlined">
          6
        </span>
      </button>
      <button class="btn" id="parkingSpot7" data-spot="7" onclick="alert('Car is already occupied...')">
        <span class="matrial-icons-outlined">
          7
        </span>
      </button>
      <button class="btn" id="parkingSpot8" data-spot="8" onclick="bookSlot(8)">
        <span class="matrial-icons-outlined">
          8
        </span>
      </button>
      <button class="btn" id="parkingSpot9" data-spot="9" onclick="bookSlot(9)">
        <span class="matrial-icons-outlined">
          9
        </span>
      </button>
      <button class="btn" id="parkingSpot10" data-spot="10" onclick="bookSlot(10)">
        <span class="matrial-icons-outlined">
          10
        </span>
      </button>
      <button class="btn" id="parkingSpot11" data-spot="11" onclick="bookSlot(11)">
        <span class="matrial-icons-outlined">
          11
        </span>
      </button>
      <button class="btn" id="parkingSpot12" data-spot="12" onclick="alert('Car is already occupied...')">
        <span class="matrial-icons-outlined">
          12
        </span>
      </button>
      <button class="btn" id="parkingSpot13" data-spot="13" onclick="bookSlot(13)">
        <span class="matrial-icons-outlined">
          13
        </span>
      </button>
      <button class="btn" id="parkingSpot14" data-spot="14" onclick="bookSlot(14)">
        <span class="matrial-icons-outlined">
          14
        </span>
      </button>
      <button class="btn" id="parkingSpot15" data-spot="15" onclick="bookSlot(15)">
        <span class="matrial-icons-outlined">
          15
        </span>
      </button>
      <button class="btn" id="parkingSpot16" data-spot="16" onclick="bookSlot(16)">
        <span class="matrial-icons-outlined">
          16
        </span>
      </button>
      <button class="btn" id="parkingSpot17" data-spot="17" onclick="bookSlot(17)">
        <span class="matrial-icons-outlined">
          17
        </span>
      </button>
      <button class="btn" id="parkingSpot18" data-spot="18" onclick="bookSlot(18)">
        <span class="matrial-icons-outlined">
          18
        </span>
      </button>
      <button class="btn" id="parkingSpot19" data-spot="19" onclick="bookSlot(19)">
        <span class="matrial-icons-outlined">
          19
        </span>
      </button>
      <button class="btn" id="parkingSpot20" data-spot="20" onclick="bookSlot(20)">
        <span class="matrial-icons-outlined">
          20
        </span>
      </button>
      <button class="btn" id="parkingSpot21" data-spot="21" onclick="alert('Car is already occupied...')">
        <span class="matrial-icons-outlined">
          21
        </span>
      </button>
      <button class="btn" id="parkingSpot22" data-spot="22" onclick="bookSlot(22)">
        <span class="matrial-icons-outlined">
          22
        </span>
      </button>
      <button class="btn" id="parkingSpot23" data-spot="23" onclick="bookSlot(23)">
        <span class="matrial-icons-outlined">
          23
        </span>
      </button>
      <button class="btn" id="parkingSpot24" data-spot="24" onclick="alert('Car is already occupied...')">
        <span class="matrial-icons-outlined">
          24
        </span>
      </button>
      <input type="hidden" id="selectedParkingSpot" name="selectedParkingSpot">
        </section>
                <div>
                    <input type="submit" value="SUBMIT" name="submit" id="submit">
                </div>
                <script>
    const parkingSpotButtons = document.querySelectorAll('.btn');
    const selectedParkingSpotInput = document.getElementById('selectedParkingSpot');

    parkingSpotButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const parkingSpot = this.getAttribute('data-spot');
            selectedParkingSpotInput.value = parkingSpot;
            parkingSpotButtons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
        });

        // button.addEventListener('keydown', function(event) {
        //     if (event.key === 'Enter' || event.keyCode === 13) {
        //         event.preventDefault(); 
        //         this.click();
        //     }
        // });
    });
</script>

<script>
  const btn = document.querySelectorAll('.btn');

btn.forEach(button => {
  button.addEventListener('click', function(e) {
    btn.forEach(btn => {
      btn.classList.remove('button-clicked');
      btn.firstElementChild.classList.remove('icon-clicked');
    });
    button.classList.add('button-clicked');
    button.firstElementChild.classList.add('icon-clicked');
  });
});

</script>


            </form>
        </div>
    </div>
    <script src="booking_form.js"></script>
</body>

</html>
<script src="booking_form.js"></script>
<script>

const btn = document.querySelectorAll('.btn');
for(let i = 0; i < btn.length; i++) {
  btn[i].addEventListener('click', function(e) {
    btn[i].classList.toggle('button-clicked');
    btn[i].firstElementChild.classList.toggle
    ('icon-clicked');
  })
}
</script>

<?php
include 'bookingdatabase.php';
?>