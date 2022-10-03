<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styling/admin.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Ebook Store</h1>
        </div>
        <! -- here is what is being displayed on the dashboard -->
        <ul>
            <li> <span>Dashboard</span> </li>
            <li><span>Users</span> </li>
            <li><span>Books</span> </li>
            <li><span>Orders</span> </li>
            
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                <! -- non functional search bar can remove if not needed -->
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="../images/search.png" alt=""></button>
                </div>
                <! -- manage users -->
                        <div class="user">
                    <a href="#" class="btn">manage users</a>
                    <img src="../images/user.png" alt="">
                    <div class="img-case">
                        <img src="../images/book.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <! -- shows the cards and their info -->
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>100</h1>
                        <h3>Users</h3>
                    </div>
                   
                </div>
                <div class="card">
                    <div class="box">
                        <h1>70</h1>
                        <h3>Books</h3>
                    </div>
                    
                </div>
                <div class="card">
                    <div class="box">
                        <h1>15</h1>
                        <h3>Orders</h3>
                    </div>
                    
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Purchases</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Book</th>
                            <th>Amount</th>
                            <th>Option</th>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>*</td>
                            <td>R50</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Liam</td>
                            <td>*</td>
                            <td>R20</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Jacob</td>
                            <td>*</td>
                            <td>R79</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Rick</td>
                            <td>*</td>
                            <td>R60</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Doe</td>
                            <td>*</td>
                            <td>R90</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        
                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>New Users</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            
                            <th>Name</th>
                            <th>Surname</th>
                            <th>StudentNumber</th>
                        </tr>
                        <tr>
                            
                            <td>Arthur</td>
                            <td>Steve</td>
                            <td>ST11111111</td>
                        </tr>
                        

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>