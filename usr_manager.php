<?php

include('scr/header.php');
?>

<head>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
    }

    h1 {
        display: inline;
    }
</style>

<body>
    <div class="divthings">
        <div class="inlinecat" style="display: flex; align-items: center">
            <h1>User Management</h1> &nbsp</h1>
            <img class="logo" src="pfp/userlogo.png">
        </div>
        <table class="table table-hover table-borderless display nowrap align-middle" id="usersearch">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Nickname</th>
                    <th>E-mail</th>
                    <th>Level</th>
                    <th>Member Since</th>
                    <th>Options</th>
                </tr>
            </thead>
        </table>
        <button type="button" class="btn addbutton" data-mdb-toggle="modal" data-mdb-target="#modalaad">
            Register a new user
        </button>
    </div>
    <!-- botoneeeeeeeeeeeeeeeeeeeeeees -->


    <!-- modal edit -->
    <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gametitlem">User</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container" id="bodymodalshow">
                    <form id="ueForm">
                        <input type="hidden" name="id" id="ueId" />
                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <input type="name" name="uname" id="ueName" class="form-control" />
                            <label class="form-label" for="ueName">Name</label>
                        </div>

                        <!-- Price input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="uemail" id="ueEmail" class="form-control" />
                            <label class="form-label" for="ueEmail">Email</label>
                        </div>
                        <!-- Description input -->
                        <div class="form-outline mb-4">
                            <input rows="text" name="ulvl" id="ueLVL" class="form-control"></input>
                            <label class="form-label" for="ueLVL">User's level</label>
                        </div>
                        <!-- Cover input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="upfp" id="uePFP" class="form-control" />
                            <label class="form-label" for="uePFP">Profile Picture URL</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn btn-block">Save Changes</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Discard</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal delete -->
    <div class="modal fade" id="modaldel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gametitlem">Delete</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container addbutton" id="bodymodalshow">
                    Are you sure you want to delete it?
                    <form id="udForm">
                        <input type="hidden" name="id" id="udId" />
                            <button type="submit" class="btn btn-primary">Yes</button>
                            <button type="button" class="btn btn-danger">No</button>
                    </form>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Discard</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal add -->
    <div class="modal fade" id="modalaad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="gametitlem">Adding a user</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container" id="bodymodalshow">
                    <form id="giForm">
                        <div class="form-outline mb-4">
                            <input type="text" name="uname" id="form1Example1" class="form-control" />
                            <label class="form-label" for="form1Example1">Nickname</label>
                        </div>

                        <!-- Price input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="uemail" id="form1Example2" class="form-control" />
                            <label class="form-label" for="form1Example2">Email</label>
                        </div>
                        <!-- Description input -->
                        <div class="form-outline mb-4">
                            <input rows="text" name="ulvl" id="ueLVL" class="form-control"></input>
                            <label class="form-label" for="form1Example2">User's level</label>
                        </div>
                        <!-- Cover input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="upfp" id="form1Example2" class="form-control" />
                            <label class="form-label" for="form1Example2">Profile Picture URL</label>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-block">Save Changes</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Do not add</button>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include('scr/footer.php');
?>