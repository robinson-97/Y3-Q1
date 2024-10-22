<x-layout>
    <section class="hero">
        <h1 id="aanvraag">Waarom wilt u <br>een afspraak inplannen?</h1>
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
                <form method="POST" action="{{ route('save.appointment') }}">
                    @csrf <!-- Dit voegt een CSRF-token toe voor beveiliging -->
                    <input type="hidden" name="selected_time" id="selectedTime">
                    <input type="hidden" name="selected_day" id="selectedDay">

                    <label for="platform">Selecteer Platform:</label>
                    <select name="device_type" id="platform" required>
                        <option value=""></option>
                        <option value="telefoon">Telefoon</option>
                        <option value="pc">PC</option>
                        <option value="appel pc/mac">Apple PC/Mac</option>
                        <option value="laptop">Laptop</option>
                        <option value="other">Other</option>
                    </select>

                    <label for="computernaam">Computer naam/Telefoon naam:</label>
                    <input type="text" name="computernaam" id="computernaam" placeholder="Computer Name" required>

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Email" required>

                    <label for="telefoonnummer">Telefoon nummer:</label>
                    <input type="text" name="telefoon_nummer" id="telefoonnummer" placeholder="Phone Number" required pattern="\d{10,15}" title="Voer een geldig telefoonnummer in (10-15 cijfers)">

                    <label for="problems">Wat zijn de problemen met het apparaat?</label>
                    <textarea name="probleem" id="problems" rows="4" placeholder="Beschrijf de issues..." required></textarea>

                    <button type="submit" class="btn" id="submitButton" disabled>Bevestig Afspraak</button>
                </form>
            </div>

            <script>
                const appointmentForm = document.getElementById("appointmentForm");
                const submitButton = document.getElementById("submitButton");
                const fields = document.querySelectorAll("#appointmentForm input, #appointmentForm select, #appointmentForm textarea");

                // Functie om te controleren of alle velden zijn ingevuld
                function checkFormValidity() {
                    let isValid = true;

                    // Loop door alle invoervelden en controleer of ze zijn ingevuld
                    fields.forEach(field => {
                        if (field.value.trim() === "") {
                            isValid = false;
                        }
                    });

                    // Button activeren of deactiveren op basis van de geldigheid van het formulier
                    submitButton.disabled = !isValid;
                }

                // Eventlistener toevoegen aan elk veld om de validatie in de gaten te houden
                fields.forEach(field => {
                    field.addEventListener("input", checkFormValidity);
                });

                let selectedSlot = null; // Track de geselecteerde tijdslot

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

                        // Bewaar de geselecteerde tijd en dag
                        document.getElementById("selectedTime").value = cell.getAttribute("data-time");
                        document.getElementById("selectedDay").value = cell.getAttribute("data-day");

                        appointmentForm.style.display = "block";
                    }
                }

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
        </div>
    </section>
</x-layout>
