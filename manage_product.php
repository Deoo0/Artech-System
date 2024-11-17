<div id="prod-container">
    <div id="prod-form">
        <form action="POST" id="addForm">
            <div id="prod-items">
                <div id="prod-login" onclick="return closeLogin()">X</div>
                <label for="">
                    <h1>
                        <strong>
                            Add Product
                        </strong>
                    </h1>
                </label><br><br><br>
                <div id="input-prod">
                    <div id="prod-name-group">
                        <label for="productName">Product Name:</label>
                        <input type="text" id="productName" placeholder="Enter Name">
                    </div>
                    <div id="prod-price-group">
                        <label for="productPrice">Price:</label>
                        <input type="text" id="productPrice" placeholder="Pesos">
                    </div>
                    <div id="prod-submit-group">
                        <input type="submit" id="addProductbutton" value="Submit" onclick="return submitProdBtn()">
                    </div>
                    </div>
            </div>
        </form>
    </div>
</div>