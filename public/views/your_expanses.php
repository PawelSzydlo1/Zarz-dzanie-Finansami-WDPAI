<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_your_expanses.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
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

                <form class="addExpense" action="addPrice" method="POST" ENCTYPE="multipart/form-data">
                    <?php if(isset($messages)){
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                    <p>Add expense</p>
                    <div class="price" >
                        <p>Price:</p>
                        <input class="priceArea" name="price_elements" required>
                    </div>
                    <div class="category">
                        <p>Category:</p>
                        <select class="cmbCategory" name="category">
                            <option value="Other"></option>
                            <option value="Food">Food</option>
                            <option value="Car">Car</option>
                            <option value="Clothes">Clothes</option>
                            <option value="Foodstuffs">Foodstuffs</option>
                            <option value="Cosmetics">Cosmetics</option>
                            <option value="Toys">Toys</option>
                        </select>
                    </div>
                    <div class="data">
                        <p>Data:</p>
                        <input class="dataArea" type="date" name="data" value="<?php echo date("Y-m-d") ?>">
                    </div>
                    <div id="add_item">
                        <button type="submit">Add</button>
                    </div>

                </form>
                <form class="uSum" action="updateSum" method="POST" ENCTYPE="multipart/form-data">
                    <div class="addMoney">
                        <div id="add_money">
                            <p >Add money to your account</p>
                        </div>

                        <div class="aMoney">
                            <p>Money:</p>
                            <input class="addMoneyArea" name="sum_area">
                        </div>
                        <div>
                            <button type="submit">Add</button>
                        </div>

                    </div>
                </form>
            </section>
        </main>
    </div>
</body>