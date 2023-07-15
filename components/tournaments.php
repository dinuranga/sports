<style>
    .page2{
        margin-top: 100vh;
    }
</style>
    <div class="container page2">
        <h1 class="mt-4">Sports Tournaments</h1>
        <div class="row mt-4">
            <?php
            // Dummy tournament data
            $tournaments = array(
                array(
                    'name' => 'Football Tournament',
                    'location' => 'Stadium A',
                    'date' => 'August 10, 2023',
                    'time' => '3:00 PM'
                ),
                array(
                    'name' => 'Basketball Tournament',
                    'location' => 'Gymnasium B',
                    'date' => 'August 15, 2023',
                    'time' => '6:30 PM'
                ),
                array(
                    'name' => 'Tennis Tournament',
                    'location' => 'Tennis Club',
                    'date' => 'August 20, 2023',
                    'time' => '10:00 AM'
                ),
                array(
                    'name' => 'Cricket Tournament',
                    'location' => 'Cricket Ground',
                    'date' => 'August 25, 2023',
                    'time' => '2:00 PM'
                )
            );

            // Loop through tournaments and create cards
            foreach ($tournaments as $tournament) {
                ?>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $tournament['name']; ?></h5>
                            <p class="card-text">Location: <?php echo $tournament['location']; ?></p>
                            <p class="card-text">Date: <?php echo $tournament['date']; ?></p>
                            <p class="card-text">Time: <?php echo $tournament['time']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>