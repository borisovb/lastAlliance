<?php namespace App\Http\Controllers;


use App\Position;
use Mail;
use Symfony\Component\Console\Input\Input;
use Illuminate\Http\Request;
use Validator;

class EmailController extends Controller
{

    public function joinForm()
    {
        $positions = Position::all();

        return view('emails/join', ['positions' => $positions]);
    }

    public function contactForm()
    {
        return view('emails/contact-us');
    }

    public function contactProcess(Request $request)
    {
        $response = $request->get('g-recaptcha-response');
        $result = $this->validateCaptcha($response);
        $data = $request->all();

        $this->validate($request, [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email',
            'subject' => 'required|max:255|min:5',
            'content' => 'required|min:20'
        ]);

        $validator = Validator::make([], []);

        if ($validator->fails() || !$result['success'])
        {
            flash('Опа! Нещо си объркал')->error();
            if (!$result['success'])
            {
                flash('Моля докажете, че не сте робот!')->error();
            }
            return redirect('contact-us')->withInput()->withErrors($validator);
        }

            Mail::send('emails/contact-message', $data, function($message)
        {
            $message->to('support@lastalliance.eu')->subject('Съобщение от сайта');
        });

        flash('Съобщението беше изпратено успешно! Скоро ще се свържем с вас за обратна връзка.')->success();
        return redirect('contact-us');
    }

    public function joinProcess(Request $request)
    {
        $response = $request->get('g-recaptcha-response');
        $result = $this->validateCaptcha($response);
        $data = $request->all();

        $this->validate($request, [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email',
            'skype' => 'required|max:255',
        ]);

        $validator = Validator::make([], []);

        if ($validator->fails() || !$result['success'])
        {
            if (!$result['success'])
            {
                flash('Моля докажете, че не сте робот!')->error();
            }
            return redirect('join')->withInput()->withErrors($validator);
        }

        Mail::send('emails.welcome', $data, function($message)
        {
            $message->to('support@lastalliance.eu')->subject('Кандидат за групата');
        });

        flash('Заявката за кандидатстване беше изпратена успешно! Скоро ще се свържем с вас за обратна връзка.')->success();
        return redirect('join');
    }

    public function validateCaptcha($response)
    {
        $secret = '6Lc3PyAUAAAAANLfmuFWXzWFUbDOxvMD0tE_7AJZ';
        $userIp = $_SERVER['REMOTE_ADDR'];
        $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$userIp");
        return $result = json_decode($url, TRUE);
    }

}
