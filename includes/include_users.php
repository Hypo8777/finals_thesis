<style>
    .users_section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 1em;
    }

    .users_section .search_users {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: .5em;
    }

    .users_section .search_users input {
        padding: .5em;
        font-size: 12px;
        border-bottom: 2px solid royalblue;
    }

    .users_section .search_users button {
        background-color: royalblue;
        color: white;
        border-radius: .5em;
        padding: .5em;
        font-size: 12px;
    }

    .users_section .list_table {
        overflow-y: scroll;
        padding-right: .5em;
        height: 500px;
    }

    .users_section .list_table table {
        border-collapse: collapse;
    }
</style>

<section class="users_section">
    <div class="search_users">
        <div class="inputs">
            <input type="search" name="" id="findUsers" placeholder="Search Username">
            <button id="searchBtn">Search</button>
            <button onclick="loadUsers()">Refresh</button>
        </div>
    </div>
    <div class="list_table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Date Added</th>
                    <th>Last Updated</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="load_users">
                <!-- Load Users -->
            </tbody>
        </table>
    </div>
</section>

<script>
    function loadUsers() {
        $.ajax({
            type: "GET",
            url: "php/view/ViewAdmin.php?load_users",
            success: async function(response) {
                $('#load_users').html(await response);
            }
        });
    }
    setTimeout(() => {
        loadUsers();
    }, 200);

    function removeAccess(user) {
        // console.log(user);
        $.ajax({
            type: "POST",
            url: "php/view/ViewAdmin.php?removeaccess",
            data: {
                removeAccessUser: user
            },
            success: async function(response) {
                const msg = await response;
                swal("Remove Access", msg, {
                    icon: "success",
                    button: false,
                    closeOnEsc: true
                });
                loadUsers();
            }
        });
    }

    function grantAccess(user) {
        // console.log(user);
        $.ajax({
            type: "POST",
            url: "php/view/ViewAdmin.php?grantaccess",
            data: {
                grantAccessUser: user
            },
            success: async function(response) {
                const msg = await response;
                swal("Remove Access", msg, {
                    icon: "success",
                    button: false,
                    closeOnEsc: true
                });
                loadUsers();
            }
        });
    }
    $('#searchBtn').click(() => {
        $.ajax({
            type: "GET",
            url: "php/view/ViewAdmin.php?searchUser",
            data: {
                findUser: $('#findUsers').val()
            },
            // dataType: "dataType",
            success: async function(response) {
                $('#load_users').html(await response);
            }
        });
    });
</script>