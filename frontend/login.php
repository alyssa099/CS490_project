<head>
    <meta charset="utf-8">
	<script src="login.js" type="text/JavaScript"></script>
</head>

<body>
    <h1>Login</h1>
    <div id="login">
        <form id="login" method="POST">
            <table>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="ucid" id="ucid">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="pass" id="pass">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" onclick="login();" value="Login">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div id="response"></div>
</body>

