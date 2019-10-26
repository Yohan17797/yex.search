<?php
include ("directories/page.php");

?>
<link rel="stylesheet" href="Semantic-UI-CSS-master/components/input.min.css">
<link rel="stylesheet" href="Semantic-UI-CSS-master/components/button.min.css">
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Messages</h1>
        <div class="ui action input">
            <input type="text" placeholder="Search..." id="paper-key">
            <button class="ui button black" id="paperSearch">Search</button>
        </div>
    </div>
    <h2>All Users</h2>
    <div class="table-responsive shadow p-3 mb-5 bg-white rounded">
        <table class="table table-hover table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th>User Name</th>
                <th>Name</th>
                <th>E-mail</th>
            </tr>
            </thead>
            <tbody id="users-table">

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Message Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="username" class="col-form-label">Message To</label>
                            <input type="text" class="form-control" placeholder="Type user name" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-form-label">Message From</label>
                            <input type="text" class="form-control" id="messagefrom" name="username" value="yohan17797" disabled>
                        </div>
                        <div class="form-group">
                            <label for="textarea" class="col-form-label">Message</label>
                            <textarea class="form-control" id="textarea" placeholder="Type your message" name="textarea"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="send">Send</button>
                </div>
                <div class="alert alert-success d-none" role="alert" id="ok">
                </div>
                <div class="alert alert-danger d-none" role="alert" id="prob">
                </div>

                <div class="text-center d-none pb-3" id="msg">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="controllers/messageControl.js"></script>
<?php
include ("directories/footer.php")

?>

