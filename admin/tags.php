<?php
include ("directories/page.php");

?>
<link rel="stylesheet" href="Semantic-UI-CSS-master/components/input.min.css">
<link rel="stylesheet" href="Semantic-UI-CSS-master/components/button.min.css">
<link rel="stylesheet" href="css/tagsinput.css">
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tags Manage</h1>
        <div class="ui action input">
            <input type="text" placeholder="Search..." id="paper-key">
            <button class="ui button black" id="paperSearch">Search</button>
        </div>
    </div>
    <h2>Details</h2>
    <div class="table-responsive shadow p-3 mb-5 bg-white rounded">
        <table class="table table-hover table-bordered">
            <thead class="border-dark thead-dark">
            <tr>
                <th>Paper Id</th>
                <th>Tag Id</th>
                <th>Tag Name</th>
            </tr>
            </thead>
            <tbody id="papers-table">

            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="myform">
                        <div class="form-group">
                            <label for="paperid" class="col-form-label">Paper Id</label>
                            <input type="text" class="form-control" disabled id="paperid" name="paperid">
                        </div>
                        <div class="form-group">
                            <label for="tagid" class="col-form-label">Tag Id</label>
                            <input type="text" class="form-control" id="tagid" disabled name="tagid">
                        </div>
                        <div class="form-group">
                            <label for="tagname" class="col-form-label">Tag Name</label>
                            <input type="text" class="form-control" id="tagname" name="tagname">
                        </div>
                        <div class="form-group">
                            <label for="addnewtags" class="col-form-label">Add New Tag</label>
                            <input type="text" data-role="tagsinput" class="form-control" id="addnewtags" name="addnewtags">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="delete">Delete Tag</button>
                    <button type="button" class="btn btn-success" id="addnew">Add New Tag</button>
                    <button type="button" class="btn btn-primary" id="update">Save changes</button>
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
<script src="Semantic-UI-CSS-master/components/search.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/tagsinput.js"></script>
<script src="controllers/tagsControl.js"></script>
<?php
include ("directories/footer.php")

?>

