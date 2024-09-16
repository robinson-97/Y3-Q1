<x-layout>
    <main>
<div class="h2text"><h2>Recent News</h2></div>
<div class="main-content">
    <section class="news">
        <div class="containerr">
{{--            <?php--}}
{{--            try {--}}
{{--                $db = new PDO("mysql:host=localhost;dbname=school", "root", "");--}}
{{--                $nieuwsbericht = $db->prepare("SELECT * FROM nieuws");--}}
{{--                $nieuwsbericht->execute();--}}

{{--                echo '<ul>';--}}

{{--                foreach($nieuwsbericht->fetchAll() as $data) {--}}
{{--                    echo "<li>" . $data["nieuwsbericht"] . "</li>";--}}
{{--                }--}}

{{--                echo '</ul>';--}}

{{--            } catch (PDOException $e) {--}}
{{--                echo "connection failed" . $e->getMessage();--}}
{{--            }--}}
{{--            ?>--}}
        </div>
    </section>
</div>
    </main>
</x-layout>
