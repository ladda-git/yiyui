<?php
session_start();

include 'includes/connect_db.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="all.min.css">
</head>
<style>
body {
    background: linear-gradient(to bottom, rgba(200, 200, 250, 0.6) 100%, rgba(200, 150, 180, 0.9) 100%), url(b5.jpg) no-repeat center/cover;
}

.overlay {
    background: linear-gradient(to bottom, rgba(200, 200, 250, 0.2) 100%, rgba(200, 150, 180, 0.4) 100%), url(b1.jpg) no-repeat center/cover;

}

select {
    background: #eee;
    padding: 5px 5px;
    margin: 5px 3px;
    width: 100%;
    border-radius: 5px;
    border: none;
    outline: none;
}

.sign-up input {
    background: #eee;
    padding: 8px 8px;
    margin: 2px 3px;
    width: 100%;
    border-radius: 5px;
    border: none;
    outline: none;
}

.disaplayInput {
    display: none;
}
</style>

<body>
    <div class="container" id="main">
        <div class="sign-up">
            <form action="signup.php" method="post" autocomplete="off">
                <h2>สร้างบัญชีเข้าใช้งาน</h2>
                <!--
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<p>or use your email for registration</p>
                -->
						<select style="margin-top:15px;" class="select mdb-select md-form dropdown-primary browser-default custom-select"
                                style="display: inline;" id="prefix" name="prefix" aria-describedby="prefix">
                                <option value="">-กรุณาเลือกคำนำหน้า-</option>
                                <?php
							$sql = "SELECT * FROM prefix";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									//$selected = ($u_unit == $row['prefix_id']) ? " selected" : "";
								  echo "
								  <option value='".$row['prefix_id']."' selected>".$row['prefix_nname']."</option>
								  ";
								}
							  } else {
								echo "0 results";
							  }
						
                        	?>
                            </select>
                            
						<select 
                                class="select mdb-select md-form dropdown-primary browser-default custom-select col-4"
                                style="display: inline;" id="gender" name="gender" aria-describedby="gender">
                                <option value="">-กรุณาเลือกเพศ-</option>
                                <?php
							$sql = "SELECT * FROM gender";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									//$selected = ($u_unit == $row['userunit_id']) ? " selected" : "";
								  echo "
								  <option value='".$row['gender_id']."' selected>".$row['gender_name']."</option>
								  ";
								}
							  } else {
								echo "0 results";
							  }
						
                        	?>
                            </select>
                       
						<select 
                                class="select mdb-select md-form dropdown-primary browser-default custom-select col-4"
                                style="display: inline;" id="unit" name="unit" aria-describedby="unit">
                                <option value="">-กรุณาเลือกหน่วยงาน-</option>
                                <?php
							$sql = "SELECT * FROM user_unit";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									//$selected = ($u_unit == $row['userunit_id']) ? " selected" : "";
								  echo "
								  <option value='".$row['userunit_id']."' selected>".$row['userunit_nname']."</option>
								  ";
								}
							  } else {
								echo "0 results";
							  }
						
                        	?>
                            </select>
                   
                <input type="text" name="fname" placeholder="Firstname" require="">
                <input type="text" name="lname" placeholder="Lastname" require="">
                <input type="text" name="username" placeholder="username" required="ประกอบด้วย ตัวอักษรพิมพ์เล็ก พิมพ์ใหญ่ ตัวเลข ความยาวมากกว่า 5 ตัว " >
                <input type="password" name="passwd" placeholder="Password" required="">
                <input type="password" name="passwdcon" placeholder="ยืนยัน Password" required="">
                <input type="email" name="email" placeholder="Email" required="">
                
                <button type="submit" name="signup">ลงทะเบียน</button>
            </form>
        </div>
        <div class="sign-in">
            <form action="authenticate.php" method="post">
                <h1>ลงชื่อเข้าสู่ระบบ</h1>
                <!--
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<p>or use your account</p>
                -->
                <input type="text" name="username" id="username" placeholder="Username" required="">
                <input type="password" name="passwd" id="passwd" placeholder="Password" required="">
                <!--<a href="#">Forget your Password?</a>-->
                <!--<input type="submit" value="เข้าสู่ระบบ" name="login">-->
                <button type="submit" name="login">เข้าสู่ระบบ</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-left">
                    <img src="img/logo/comm-rtaf.png" height="250" alt="" loading="lazy" />
                    <h1>ยินดีต้อนรับ</h1>
                    <p><span style="color:yellow;">กรุณากรอกข้อมูลให้ครบถ้วน และถูกต้อง<br>เพื่อลงทะเบียนหรือ</span></p>
                    <button id="signIn">ลงชื่อเข้าสู่ระบบ</button>
                </div>
                <div class="overlay-right">
                    <img src="img/logo/comm-rtaf.png" height="250" alt="" loading="lazy" />
                    <h1>ยินดีต้อนรับ</h1>
                    <p><span style="color:yellow;">กรุณากรอกข้อมูลให้ครบถ้วน และถูกต้อง<br>เพื่อเข้าสู่ระบบหรือ</span>
                    </p>
                    <button id="signUp">ลงทะเบียน</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <table>
            <tr>
                <th style="color: rgb(68, 64, 64);padding-top: 15px;">
                    RTAF Computer Center Development Section&nbsp;&nbsp;
                </th>
                <th style="padding-top:10px;"><img src="img/comcenter.png" height="40" alt="" loading="lazy" /></th>
            </tr>
        </table>

        <p>
            <b><br></b>
            <br>


            <!--	<a href="manual_RTAF_LEAVE.pdf" target="new">คู่มือการใช้งาน </a>-->

        </p>
    </footer>
    <script type="text/javascript">
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const main = document.getElementById('main');

    signUpButton.addEventListener('click', () => {
        main.classList.add("right-panel-active");
    });
    signInButton.addEventListener('click', () => {
        main.classList.remove("right-panel-active");
    });
    </script>
    <script>
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
    </script>
    <script>
    const mySelect = document.getElementById("textSelect");
    const inputOther = document.getElementById("form12");
    const labelInput = document.getElementById("inputLabel");
    const divInput = document.getElementById("inputDiv");
    const selectDiv = document.getElementById("textSelectdiv");

    mySelect.addEventListener('optionSelect.mdb.select', function(e) {
        const SelectValue = document.getElementById('textSelect').value;
        if (SelectValue === 'customOption') {
            inputOther.style.display = 'inline';
            inputOther.removeAttribute('disabled');
            labelInput.classList.remove('disaplayInput');
            divInput.classList.remove('disaplayInput');
            selectDiv.style.display = 'none';
            inputOther.focus();
            mySelect.disabled = 'true';

        } else {
            a.style.display = 'none';
        }
    })

    function hideInput() {
        if (inputOther !== null && inputOther.value === "") {
            inputOther.style.display = 'none';
            inputOther.setAttribute('disabled', '');
            selectDiv.style.display = 'inline';
            mySelect.removeAttribute('disabled');
            labelInput.classList.add('disaplayInput');
            divInput.classList.add('disaplayInput');
        }
    }
    </script>

</body>

</html>
