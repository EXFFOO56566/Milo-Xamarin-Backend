<?php
$RegisterData = getAllMasterDatawithId('register', ['id' => $meeting_details[0]->created_by]);
?>  
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Meeting history</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        
    </head>
    <body style="font-family: 'Roboto', sans-serif;">
        <div style="width:700px;margin:0 auto; font-family:arial;">
            <div style="width:100%; float:left; ">
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr style="background: #6966ff; color: #fff;">
                        <td colspan="2">Meeting Title: <?= $meeting_details[0]->title; ?></td>
                        <td colspan="2">Meeting Organizer : <?= $RegisterData[$meeting_details[0]->created_by]; ?></td>
                    </tr>
                    <tr>
                        <td>Meeting ID: <?= $meeting_details[0]->meeting_id; ?></td>
                        <td>Meeting Pwd: <?= $meeting_details[0]->password; ?></td>
                        <td colspan="2">
                            Start Time: <?= date('d-m-Y', strtotime($meeting_details[0]->meeting_start_date)); ?> ( <?= date('h:i A', strtotime($meeting_details[0]->starting_time)); ?> ) <br>
                            End Time: <?= date('d-m-Y', strtotime($meeting_details[0]->meeting_start_date)); ?> ( <?= date('h:i A', strtotime($meeting_details[0]->ending_time)); ?> )
                        </td>
                    </tr>

                    <tr>
                        <td width="25%">Meeting Agenda</td>
                        <td width="25%"><?= $meeting_details[0]->agenda; ?></td>
                        <td width="25%">Meeting Takeaways</td>
                        <td width="25%"><?= $meeting_details[0]->takeaways; ?></td>
                    </tr>

                    <tr style="background: #6abb21; color: #fff;">
                        <td>Meeting User</td>
                        <td>Status</td>
                        <td>Signature</td>
                        <td>Date</td>
                    </tr>
                    <?php
                    $TotalCount = 0;
                    $Pername = __getmeetingper($meeting_details[0]->id, $meeting_details[0]->created_by);
                    foreach ($Pername as $pvalue) {
                        $TotalCount++;
                        if ($pvalue->status == 1) {
                            $Status = 'Accepted';
                            $Color = 'green';
                        } else if ($pvalue->status == 0) {
                            $Status = '';
                            $Color = '';
                        } else if ($pvalue->status == 2) {
                            $Status = 'Rejected';
                            $Color = 'red';
                        }
                        ?>
                        <tr>
                            <td><?= $pvalue->name ?></td>
                            <td style="color:<?= $Color ?>;"><?= $Status ?></td>
                            <td></td>
                            <td><?= date('d-m-Y', strtotime($meeting_details[0]->meeting_start_date)) ?></td>
                        </tr>
                        <?php
                    }
                    ?>

                    <tr>
                        <td>Notes</td>

                        <td colspan="2">  </td>
                        <td style="background: #ffc92f;">Participant Count: <?= $TotalCount ?></td>
                    </tr>


                </table>
            </div>
        </div>
    </body>
</html>
