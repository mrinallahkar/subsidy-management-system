<div style="width: 700px; margin-left: auto; margin-right: auto; border: 1px solid whitesmoke; min-height: 99%; padding:0px;">
    <div style="width: 100%; text-align: left; height: 85px; border-bottom:1px solid whitesmoke;">
        <img src="{{ url('assets/images/side_logo.png') }}" alt="logo" />
    </div>
    <div id="areaUserDatails" style="width: 98%; padding: 5px; margin:auto;">
        <table style="width: 500px; margin: auto; background: whitesmoke;  padding: 5px;">
            <tr>
                <td style="float: left; font-size: medium; font-weight: bold;">Current Username</td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid lightgrey;"></td>
            </tr>
            <tr>
                <td style="word-break: break-all;">Hi&nbsp;<span style="text-transform: capitalize; text-align: left;">{{$user->User_Id}}</span>,</td>
            </tr>
            <tr>
                <td style="padding:2px;">
                </td>
            </tr>
            <tr>
                <td style="text-align: left;">Recently you have requested to get your current Application username.</td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td style="text-align: left;">So, Your Current username is given below:</td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <label style="margin: auto;  border: 1px solid lightgray; background: snow; text-align: center; padding: 5px; font-weight: bold;">{{$username}}</label>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid lightgrey;"></td>
            </tr>
            <tr>
                <td style="text-align: left; font-weight: normal; color:darkblue; text-transform: none; font-size: small;">
                    Note: Do not share your credentials with anyone.
                </td>
            </tr>
            <tr>
                <td style="text-align: left; font-weight: normal; color:darkblue; text-transform: none; font-size: small;">
                    If you have question or encounter any issue in logging, please contact administrator.
                </td>
            </tr>

            <tr>
                <td style="border-top: 1px solid lightgrey;"></td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
        </table>
    </div>
</div>