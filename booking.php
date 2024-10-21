<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Tanggal dan Waktu - Fotosandiri Studio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #99A0E2;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #3C47AF;
            padding: 0.5rem 1rem;
            margin-bottom: 20px;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1);
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header p {
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: bold;
            color: white;
        }
        .box-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .box {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            max-width: 45%;
            text-align: center;
            color: #3C47AF;
            margin: 10px 0;
        }
        .calendar-container, .time-container {
            margin-bottom: 20px;
        }
        .calendar {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .calendar-month {
            background-color: #3C47AF;
            color: white;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
            text-align: center;
            width: 100%;
        }
        .calendar-month-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
        .calendar-month p {
            margin: 0;
            flex-grow: 1;
            text-align: center;
        }
        .calendar-month button {
            background-color: #FFFFFF;
            color: #3C47AF;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .calendar-header {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 10px;
        }
        .calendar-header div {
            width: calc(100% / 7 - 2px);
            text-align: center;
            color: #3C47AF;
        }
        .calendar-days {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }
        .calendar-day {
            width: calc(100% / 7 - 2px);
            height: 60px;
            background-color: white;
            color: #3C47AF;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            margin: 1px;
        }
        .calendar-day p {
            margin: 0;
        }
        .calendar-day.selected {
            background-color: #FFE500;
            color: #3C47AF;
        }
        .time-slots {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
            justify-content: center;
            border: 1px solid #3C47AF;
            border-radius: 5px;
            padding: 10px;
        }
        .time-slot {
            background-color: white;
            color: #3C47AF;
            padding: 10px 20px;
            text-align: center;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px;
            width: 80px;
            border: 1px solid #3C47AF;
        }
        .time-slot.selected {
            background-color: #FFE500;
            color: #3C47AF;
        }
        .time-slot.unavailable {
            background-color: #6C757D;
            color: white;
            cursor: not-allowed;
        }
        .availability div {
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            flex: 1;
            margin: 0 10px;
        }
        .availability .available {
            background-color: white;
            color: #3C47AF;
        }
        .availability .selected {
            background-color: #FFE500;
            color: #3C47AF;
        }
        .availability .unavailable {
            background-color: #6C757D;
            color: white;
        }
        .btn-confirm {
            background-color: #FFE500;
            border: 2px solid #3C47AF;
            padding: 10px 20px;
            color: #3C47AF;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 18px;
            width: 100%;
            text-align: center;
            cursor: pointer;
        }
        .btn-confirm:hover {
            background-color: #3C47AF;
            color: #FFE500;
        }
        .footer {
            background-color: #3C47AF;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 20px;
        }
        .footer a {
            color: white;
        }
        .note {
            text-align: center;
            margin-top: 10px;
            color: white;
        }
        @media (max-width: 768px) {
            .box-container {
                flex-direction: column;
            }
            .box {
                max-width: 100%;
            }
            .calendar-header, .calendar-days, .calendar-day {
                width: 100%;
            }
            .calendar-day, .calendar-header div {
                width: calc(100% / 7 - 2px);
                margin: 1px;
            }
        }
        .form-text {
            text-align: center;
            margin: 20px 0;
            color: #dc3545;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">
        <img src="images/Logo Fosan.png" alt="Logo FOTOSANDIRI.STUDIO" style="height: 30px;">
    </a>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto">FOTOSANDIRI.STUDIO</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="lokasi.php">Location</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ringkasan_pesanan.php">Invoice</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="header">
        <p>Pilih Tanggal dan Waktu</p>
    </div>
    <div class="box-container">
        <div class="box">
            <h3>Tanggal dan Hari</h3>
            <div class="calendar-container">
                <div class="calendar">
                    <div class="calendar-month">
                        <div class="calendar-month-container">
                            <button onclick="changeMonth(-1)">&lt;</button>
                            <p id="calendar-month"></p>
                            <button onclick="changeMonth(1)">&gt;</button>
                        </div>
                    </div>
                    <div class="calendar-header">
                        <div>Min</div>
                        <div>Sen</div>
                        <div>Sel</div>
                        <div>Rab</div>
                        <div>Kam</div>
                        <div>Jum</div>
                        <div>Sab</div>
                    </div>
                    <div class="calendar-days" id="calendar-days"></div>
                </div>
            </div>
        </div>
        <div class="box">
            <h3>Jam</h3>
            <div class="time-container">
                <div class="time-slots" id="time-slots"></div>
            </div>
        </div>
    </div>
    <div class="form-text">
        <p>Maksimal booking H-2</p>
    </div>
    <form id="bookingForm" action="konfirmasi_pesanan.php" method="POST">
        <input type="hidden" id="selectedDate" name="selected_date" value="">
        <input type="hidden" id="selectedTime" name="selected_time" value="">
        <input type="hidden" name="package_name" value="<?php echo htmlspecialchars($_POST['package_name']); ?>">
        <input type="hidden" name="package_price" value="<?php echo htmlspecialchars($_POST['package_price']); ?>">
        <input type="hidden" name="extra_people" value="<?php echo htmlspecialchars($_POST['extra_people']); ?>">
        <input type="hidden" name="extra_prints" value="<?php echo htmlspecialchars($_POST['extra_prints']); ?>">
        <button type="submit" class="btn-confirm">Konfirmasi</button>
    </form>
</div>
<div class="footer">
    &copy; 2023 FOTOSANDIRI.STUDIO. All rights reserved.
</div>
<script>
    const calendarDays = document.getElementById("calendar-days");
    const calendarMonth = document.getElementById("calendar-month");
    const timeSlotsContainer = document.getElementById("time-slots");
    const selectedDateInput = document.getElementById("selectedDate");
    const selectedTimeInput = document.getElementById("selectedTime");

    let currentDate = new Date();
    let selectedDate = null;
    let selectedTimeSlot = null;

    function renderCalendar() {
        const month = currentDate.getMonth();
        const year = currentDate.getFullYear();
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        calendarMonth.textContent = `${currentDate.toLocaleString('default', { month: 'long' })} ${year}`;

        calendarDays.innerHTML = "";

        for (let i = 0; i < firstDay; i++) {
            const emptyDay = document.createElement("div");
            emptyDay.classList.add("calendar-day");
            calendarDays.appendChild(emptyDay);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const date = new Date(year, month, day);
            const dayElement = document.createElement("div");
            dayElement.classList.add("calendar-day");
            if (selectedDate && date.toDateString() === selectedDate.toDateString()) {
                dayElement.classList.add("selected");
            }
            dayElement.innerHTML = `<p>${day}</p>`;
            dayElement.onclick = () => selectDate(date);
            calendarDays.appendChild(dayElement);
        }
    }

    function changeMonth(delta) {
        currentDate.setMonth(currentDate.getMonth() + delta);
        renderCalendar();
    }

    function selectDate(date) {
    date.setHours(12, 0, 0, 0); 
    selectedDate = date;
    renderCalendar();
    renderTimeSlots();
    selectedDateInput.value = date.toISOString().split('T')[0];
    }

    function renderTimeSlots() {
        const times = [];
        let currentTime = new Date();
        currentTime.setHours(10, 0, 0, 0);
        const endTime = new Date();
        endTime.setHours(22, 30, 0, 0);

        while (currentTime <= endTime) {
            times.push(currentTime.toTimeString().slice(0, 5));
            currentTime.setMinutes(currentTime.getMinutes() + 30);
        }

        timeSlotsContainer.innerHTML = "";

        times.forEach(time => {
            const timeSlot = document.createElement("div");
            timeSlot.classList.add("time-slot");
            timeSlot.textContent = time;
            if (selectedTimeSlot === time) {
                timeSlot.classList.add("selected");
            }
            timeSlot.onclick = () => selectTimeSlot(time);
            timeSlotsContainer.appendChild(timeSlot);
        });
    }

    function selectTimeSlot(time) {
        selectedTimeSlot = time;
        renderTimeSlots();
        selectedTimeInput.value = time;
    }

    renderCalendar();
    renderTimeSlots();
</script>
</body>
</html>
