<?php

namespace App;

use Illuminate\Mail\Message;
use App\Notifications\CustomWelcome;
use Mail;

class ActivationService
{

    protected $activationRepo;

    protected $resendAfter = 1;

    public function __construct(ActivationRepository $activationRepo)
    {
        $this->activationRepo = $activationRepo;
    }

    public function sendActivationMail($user)
    {

        /*if ($user->activated || !$this->shouldSend($user)) {
            return;
        }*/

        $token = $this->activationRepo->createActivation($user);

        $link = route('user.activate', $token);
        $user->notify(new CustomWelcome($link));

        /*$message = sprintf('<div><a href="%s">%s</a></div>', $link, $link);
        $mesg = '<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Activate account</title></head><body bgcolor="#8d8e90"><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
        <tr> <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center"><tr> <td align="center">&nbsp;</td> </tr>
        <tr> <td>&nbsp;</td> </tr> <tr> <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> <td width="10%">&nbsp;</td> <td width="80%" align="left" valign="top"><font style="font-family: Georgia, \'Times New Roman\', Times, serif; color:#010101;
        font-size:24px"><strong><em>Bitlife Trading Email Verification</em></strong></font><br /><br />
        <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px">
        Click on the link below to activate your account <br ><center>'.$message.'</center></font></td><td width="10%">&nbsp;</td> </tr>
        <tr> <td>&nbsp;</td> <td align="right" valign="top"><table width="108" border="0" cellspacing="0" cellpadding="0">
        <tr> <td height="10" align="center" valign="middle"> </td> </tr> </table></td> <td>&nbsp;</td></tr> </table></td> </tr>
        <tr> <td>&nbsp;</td></tr><tr> <td>&nbsp;</td> </tr> <tr> <td>&nbsp;</td> </tr> <tr> <td>&nbsp;</td> </tr>
        <tr> <td align="center"><font style="font-family:\'Myriad Pro\', Helvetica, Arial, sans-serif;
        color:#231f20; font-size:8px"><strong>Bitlife Trading Company | <a href= "https://bitlifetrading.com" style="color:#010203; text-decoration:none">
        support@bitlifetrading.com</a></strong></font></td> </tr> <tr> <td>&nbsp;</td> </tr> </table></td> </tr></table></body></html>';

        /*Mail::raw($mesg, function (Message $m) use ($user) {
            $m->from('noreply@bitlifetrading.com', 'Bitlife Trading');
            $m->to($user->email)->subject('Bitlife Trading Activation');
            $m->setContentType("text/html");
        });

        Mail::send([], [], function($m) use ($mesg, $user) {
            $m->from('support@bitlifetrading.com', 'Bitlife Trading');
            $m->to($user->email);
            $m->subject('Bitlife Trading Activation');
            $m->setBody($mesg, 'text/html');
        });*/

    }

    public function activateUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $user = User::find($activation->user_id);

        $user->activated = 1;

        $user->save();

        $this->activationRepo->deleteActivation($token);

        return $user;

    }

    private function shouldSend($user)
    {
        $activation = $this->activationRepo->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }

}
