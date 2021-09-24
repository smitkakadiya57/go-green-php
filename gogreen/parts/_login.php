

<div class="modal-wrapper">
    <div class="modal-container">
        <button class="close">&times;</button>
        <h2 class="modal-title">Login</h2>
        <hr>
        <div class="modal-content">

            <form action="/gogreen/index.php" method="POST">
                <div class="form_field">
                    <label for="mno">Mobile No<span>*</span></label>
                    <input type="text" id="mno" name="mno" maxlength="10" required>
                </div>
                <div class="form_field">
                    <label for="password">Password<span>*</span></label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                    <button type="submit" >Log In </button>
             
            </form>
        </div>

    </div>
</div>