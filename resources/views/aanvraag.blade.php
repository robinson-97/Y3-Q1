<x-layout>
<section class="hero">
    <div class="container">
        <h1>Aanvraag</h1>
        <form method="POST">
            <label for="platform">Select Platform:</label>
            <select name="device_type" id="cars">
                <option></option>
                <option value="telefoon">Telefoon</option>
                <option value="pc">PC</option>
                <option value="appel pc/mac">Apple PC/Mac</option>
                <option value="laptop">Laptop</option>
                <option value="other">Other</option>
            </select>
            <label for="name">Computer naam/Telefoon naam:</label>
            <input type="text" class="" name="computernaam" placeholder="Computer Name">
            <label for="email">Email:</label>
            <input type="text" class="" name="email" placeholder="Email">
            <label for="telefoonnummer">Telefoon nummer:</label>
            <input type="text" class="" name="telefoon_nummer" placeholder="Phone Number">
            <label for="message">Probleem met product:</label>
            <textarea name="probleem" placeholder="Probleem"></textarea>
            <input type="submit" class="btn"></input>
        </form>
    </div>
</section>

<section class="picture">
    <div class="container">
        <img src="img/contact_picture.jpg" alt="Contact Picture">
    </div>
</section>
</x-layout>
