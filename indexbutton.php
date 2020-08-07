<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form role="form" method="POST" action="includes/login.inc.php">
                    <div class="form-group">
                        <label for="mail"><span class="glyphicon glyphicon-user"></span> Email</label>
                        <input type="text" class="form-control" id="mail" name="mail" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="pass"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter password">
                    </div>
                    <button type="submit" name="login-submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                </form>
            </div>
            <div class="modal-footer">

                <button type="submit" name="login-submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancel</button>
                <p>Not a member? <a href="index.php">Sign Up</a></p>

            </div>
        </div>

    </div>
</div>


<script>
    $(document).ready(function() {
        $("#myBtn").click(function() {
            $("#myModal").modal();
        });
    });
</script>