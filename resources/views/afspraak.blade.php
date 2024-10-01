<x-layout>
    <section class="hero">
        <h1 id="aanvraag">Waarom wilt u <br>een afspraak inplannen?</h1>
        <div class="container">

            <div class="container">

                <!-- Kalender voor tijdslots -->
                <table id="calendar">
                    <thead>
                    <tr>
                        <th>Time</th>
                        <th>Monday <span id="mondayDate"></span></th>
                        <th>Tuesday <span id="tuesdayDate"></span></th>
                        <th>Wednesday <span id="wednesdayDate"></span></th>
                        <th>Thursday <span id="thursdayDate"></span></th>
                        <th>Friday <span id="fridayDate"></span></th>
                        <th>Saturday <span id="saturdayDate"></span></th>
                        <th>Sunday <span id="sundayDate"></span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Time slots will be dynamically generated -->
                    </tbody>
                </table>

                <!-- Formulier dat verschijnt na het selecteren van een tijdslot -->
                <div id="appointmentForm" style="display:none;">
                    <h3>Appointment Details</h3>
                    <form method="POST">
                        <label for="platform">Selecteer Platform:</label>
                        <select name="device_type" id="platform">
                            <option></option>
                            <option value="telefoon">Telefoon</option>
                            <option value="pc">PC</option>
                            <option value="appel pc/mac">Apple PC/Mac</option>
                            <option value="laptop">Laptop</option>
                            <option value="other">Other</option>
                        </select>

                        <label for="computernaam">Computer naam/Telefoon naam:</label>
                        <input type="text" name="computernaam" placeholder="Computer Name">

                        <label for="email">Email:</label>
                        <input type="email" name="email" placeholder="Email">

                        <label for="telefoonnummer">Telefoon nummer:</label>
                        <input type="text" name="telefoon_nummer" placeholder="Phone Number">

                        <label for="problems">Wat zijn de problemen met het apparaat?</label>
                        <textarea name="probleem" id="problems" rows="4" placeholder="Beschrijf de issues..."></textarea>

                        <button id="confirmButton" class="btn">Confirm Appointment</button>
                    </form>
                </div>
            </div>

            <script>
                let selectedSlot = null; // Track de geselecteerde tijdslot
                const confirmButton = document.getElementById("confirmButton");
                const appointmentForm = document.getElementById("appointmentForm");

                // Functie om tijdslots te genereren
                function generateTimeSlots() {
                    const tableBody = document.querySelector("#calendar tbody");
                    const startTime = 9.5; // 9:30 AM in decimaal formaat
                    const endTime = 16.5; // 16:30 PM in decimaal formaat
                    const slotDuration = 0.5; // 30 minuten per slot
                    const days = 7; // Aantal dagen in de week

                    for (let time = startTime; time <= endTime; time += slotDuration) {
                        const row = document.createElement("tr");
                        const timeSlot = formatTime(time);
                        const timeCell = document.createElement("td");
                        timeCell.textContent = timeSlot;
                        row.appendChild(timeCell);

                        for (let i = 0; i < days; i++) {
                            const cell = document.createElement("td");
                            cell.textContent = "Available";
                            cell.setAttribute("data-time", timeSlot);
                            cell.setAttribute("data-day", i);
                            cell.addEventListener("click", selectSlot);
                            row.appendChild(cell);
                        }

                        tableBody.appendChild(row);
                    }
                }

                // Functie om decimaal tijd om te zetten naar HH:MM
                function formatTime(time) {
                    const hour = Math.floor(time);
                    const minute = (time % 1) * 60;
                    const formattedHour = hour < 10 ? '0' + hour : hour;
                    const formattedMinute = minute < 10 ? '0' + minute : minute;
                    return `${formattedHour}:${formattedMinute}`;
                }

                // Functie om een tijdslot te selecteren
                function selectSlot(event) {
                    const cell = event.target;

                    if (selectedSlot) {
                        selectedSlot.textContent = "Available";
                        selectedSlot.classList.remove("selected");
                    }

                    if (!cell.classList.contains("booked")) {
                        cell.textContent = "Selected";
                        cell.classList.add("selected");
                        selectedSlot = cell;

                        // Toon het afspraakformulier als een tijdslot is geselecteerd
                        appointmentForm.style.display = "block";
                        confirmButton.classList.remove("disabled");
                    }
                }

                // Functie om de afspraak te bevestigen
                confirmButton.addEventListener("click", () => {
                    if (selectedSlot) {
                        const product = document.getElementById("platform").value;
                        const problems = document.getElementById("problems").value;

                        if (product && problems) {
                            selectedSlot.textContent = "Booked";
                            selectedSlot.classList.add("booked");
                            selectedSlot.classList.remove("selected");

                            // Reset het formulier en verberg het afspraakformulier
                            document.getElementById("platform").value = "";
                            document.getElementById("problems").value = "";
                            appointmentForm.style.display = "none";
                            confirmButton.textContent = "Appointment Confirmed";
                            confirmButton.classList.add("disabled");
                            confirmButton.setAttribute("disabled", true); // Disable de knop na bevestiging
                        } else {
                            alert("Vul alle velden in.");
                        }
                    }
                });

                // Functie om de datums van de huidige week te genereren
                function generateDates() {
                    const today = new Date();
                    const firstDayOfWeek = today.getDate() - today.getDay() + 1; // Maandag als eerste dag
                    const currentWeek = [];

                    for (let i = 0; i < 7; i++) {
                        const date = new Date(today.setDate(firstDayOfWeek + i));
                        const day = date.getDate();
                        const month = date.getMonth() + 1; // JavaScript maanden zijn 0-gebaseerd
                        currentWeek.push(`${day}/${month < 10 ? '0' + month : month}`);
                    }

                    document.getElementById("mondayDate").textContent = currentWeek[0];
                    document.getElementById("tuesdayDate").textContent = currentWeek[1];
                    document.getElementById("wednesdayDate").textContent = currentWeek[2];
                    document.getElementById("thursdayDate").textContent = currentWeek[3];
                    document.getElementById("fridayDate").textContent = currentWeek[4];
                    document.getElementById("saturdayDate").textContent = currentWeek[5];
                    document.getElementById("sundayDate").textContent = currentWeek[6];
                }

                // Genereer de tijdslots en datums bij het laden van de pagina
                document.addEventListener("DOMContentLoaded", () => {
                    generateTimeSlots();
                    generateDates();
                });
            </script>

        </div>
    </section>

    <section class="picture">
        <div class="container">
            <img src="img/contact_picture.jpg" alt="Contact Picture">
        </div>
    </section>
</x-layout>
