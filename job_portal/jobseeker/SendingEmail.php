<?php


     if (mail($emailTo, $subject, $body, $headers)) {
                echo "Mail sent successfully!";
                    } else {
                                echo "Mail not sent!";
                    }
?>
