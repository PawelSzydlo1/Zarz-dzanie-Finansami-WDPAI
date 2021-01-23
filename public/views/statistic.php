<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_statistic.css">
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/graph.js" defer></script>
    <title>PROJECTS</title>
</head>

<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo2.svg">
            <ul>
                <li>
                    <i class="fas fa-receipt"></i>
                    <a href="your_expanses" class="button">Your expanses</a>
                </li>
                <li>
                    <i class="fas fa-chart-line"></i>
                    <a href="statistic" class="button">Statistic</a>
                </li>
                <li>
                    <i class="fas fa-id-badge"></i>
                    <a href="contact" class="button">Contact</a>
                </li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="total_money">
                    <p>Total money:</p>
                    <p class="money"> <?= $sum->getSum() - $minus?> zł </p>
                </div>

                <div class="profile" onclick="location.href='logout'">
                    <i class="fas fa-sign-out-alt"></i> Log out
                </div>
            </header>

            <section class="projects">

                <div class="transaction">
                    <p>Transaction</p>
                    <div class="list">
                        <?php foreach($prices as $price): ?>
                        <div class="element_list">

                            <div class="cp_option">
                                <p><?= $price->getPrice()?></p>
                                <p><?= $price->getCategory()?></p>
                            </div>
                            <div class="d_option">
                                <p><?= $price->getData()?></p>
                            </div>

                        </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="summary">
                        <p>Summary:</p>
                        <p> -<?= $minus ?> zł</p>
                    </div>
                </div>
                <div class="graph_area">
                    <p>Last month</p>
                    <div class="graph">
                        <canvas id="myChart" width="30" height="30"></canvas>
                    </div>

                </div>

            </section>
        </main>
    </div>
</body>