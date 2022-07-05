<?php
class Toolbox
{
    public const COULEUR_ROUGE = "alert-danger";
    public const COULEUR_ORANGE = "alert-warning";
    public const COULEUR_VERTE = "alert-success";

    public static function ajouterMessageAlerte($message, $type)
    {
        $_SESSION['alert'][] = [
            "message" => $message,
            "type" => $type
        ];
    }
    public static function displayRole($role): string
    {
        switch ((int)$role) {
            case 0:
                return 'Non-inscrit';
                break;
            case 1:
                return 'inscrit';
                break;
            case 2:
                return 'Admin';
                break;

            default:
                return 'Non-inscrit';
                break;
        }
    }

    public static function sendMail($sendTo, $subject, $content)
    {
        $headers = "from: openclassroom@jbscreative.dev";
        $sendTo = "stephan.jeanba@gmail.com";
        $subject = "test subject";
        $content = "test content";

        mail($sendTo, $subject, $content, $headers);
    }
}
