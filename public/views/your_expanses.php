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
                    <a href="#" class="button">Statistic</a>
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
                    <p class="money"> 159 zł</p>
                </div>

                <div class="profile">
                    <i class="fas fa-user-edit"></i> Profile
                </div>
            </header>

            <section class="projects">
                <div class="transaction">
                    <p>Transaction</p>
                    <div class="list">
                        <div class="element_list">
                            <div class="cp_option">
                                <p>category</p>
                                <p>price</p>
                            </div>
                            <div class="d_option">
                                <p>data</p>
                            </div>
                        </div>


                    </div>
                    <div class="summary">
                        <p>Summary:</p>
                        <p> -302 zł</p>
                    </div>
                </div>
                <div class="addExpense">
                    <p>Add expense</p>
                    <div class="price">
                        <p>Price:</p>
                        <input class="priceArea"></input>
                    </div>
                    <div class="category">
                        <p>Category:</p>
                        <select class="cmbCategory">
                            <option value="0">Select Category</option>
                            <option value="1">---ANY---</option>
                            <option value="2">Food</option>
                            <option value="3">Car</option>
                        </select>
                    </div>
                    <div class="data">
                        <p>Data:</p>
                        <input class="dataArea"></input>
                    </div>
                    <div id="add_item">
                        <button>Add</button>
                    </div>

                    <div class="addMoney">
                        <div id="add_money">
                            <p >Add money to your account</p>
                        </div>

                        <div class="aMoney">
                            <p>Money:</p>
                            <input class="addMoneyArea"></input>
                        </div>
                        <div>
                            <button>Add</button>
                        </div>

                    </div>
                </div>

                
            </section>
        </main>
    </div>
</body>