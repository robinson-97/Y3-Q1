<x-layout>
    <div class="h2text"><h2>FAQ</h2></div>
    <div class="main-content">
        <section class="news">
            <div class="containerr">
                <?php
                try {
                    $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
                    $nieuwsbericht = $db->prepare("SELECT * FROM faq");
                    $nieuwsbericht->execute();

                    echo '<ul>';

                    foreach($nieuwsbericht->fetchAll() as $data) {
                        echo "<li>" . $data["post"] . "</li>";
                    }

                    echo '</ul>';

                } catch (PDOException $e) {
                    echo "connection failed" . $e->getMessage();
                }
                ?>
            </div>
        </section>
    </div>
</x-layout>
