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
            <h1>Games Management &nbsp</h1>
            <img class="logo" src="https://cdn0.iconfinder.com/data/icons/retro-items-4/64/Game_Controller-512.png">

        </div>
        <table class="table table-hover table-borderless display nowrap align-middle" id="gamesearch">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th style='max-width: 150px;'>Description</th>
                    <th>Price</th>
                    <th>Release Date</th>
                    <th>Options</th>
                </tr>
            </thead>
        </table>
        <button type="button" class="btn addbutton" data-mdb-toggle="modal" data-mdb-target="#modalaad">
            Add a new game
        </button>
    </div>
    <!-- botoneeeeeeeeeeeeeeeeeeeeeees -->


    <!-- modal edit -->
    <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="gametitlem">Game name</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container" id="bodymodalshow">
                    <form id="geForm">
                        <input type="hidden" name="id" id="geId" />
                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <input type="name" name="gname" id="geName" class="form-control" />
                            <label class="form-label" for="geName">Name</label>
                        </div>

                        <!-- Price input -->
                        <div class="form-outline mb-4">
                            <input type="number" name="gprice" id="gePrice" class="form-control" />
                            <label class="form-label" for="gePrice">Price</label>
                        </div>
                        <!-- Description input -->
                        <div class="form-outline mb-4">
                            <textarea rows="3" name="gdesc" id="geDesc" class="form-control"></textarea>
                            <label class="form-label" for="geDesc">Description</label>
                        </div>
                        <!-- Cover input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="gcover" id="geCover" class="form-control" />
                            <label class="form-label" for="geCover">Game cover</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-block">Save Changes</button>
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
                    <h5 class="modal-title" id="gametitlem">Delete gamename</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container" id="bodymodalshow">
                    Are you sure you want to delete gamename?
                    <form id="gdForm">
                        <input type="hidden" name="id" id="gdId" />
                        <button type="submit" class="btn btn-primary">Yes</button>
                        <button type="button" data-mdb-dismiss="modal" class="btn btn-danger">No</button>
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
                    <h5 class="modal-title" id="gametitlem">Adding a new game</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container" id="bodymodalshow">
                    <form id="giForm">
                        <div class="form-outline mb-4">
                            <input type="text" name="gname" id="form1Example1" class="form-control" />
                            <label class="form-label" for="form1Example1">Name</label>
                        </div>

                        <!-- Price input -->
                        <div class="form-outline mb-4">
                            <input type="number" name="gprice" id="form1Example2" class="form-control" />
                            <label class="form-label" for="form1Example2">Price</label>
                        </div>
                        <!-- Description input -->
                        <div class="form-outline mb-4">
                            <textarea rows="3" name="gdesc" id="geDesc" class="form-control"></textarea>
                            <label class="form-label" for="form1Example2">Description</label>
                        </div>
                        <!-- Cover input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="gcover" id="form1Example2" class="form-control" />
                            <label class="form-label" for="form1Example2">Game cover</label>
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