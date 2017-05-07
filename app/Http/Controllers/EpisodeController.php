<?php namespace App\Http\Controllers;

use App\Episode;

class EpisodeController extends Controller
{
    public function watchEpisode($slug)
    {
        $episode = Episode::where('slug', '=', $slug)->first();
        $nextEpisode = Episode::where('project_id', '=', $episode->project->id)->where('number', '=', $episode->number + 1)->first();
        $previousEpisode = Episode::where('project_id', '=', $episode->project->id)->where('number', '=', $episode->number - 1)->first();

        if (is_null($episode) || $episode->stream_link === "")
        {
            flash('Този епизод не съшествува!')->error();
            return view('errors/404');
        }

        $url = $episode->stream_link;
        $embedUrl = str_replace("https://www.vbox7.com/play:", "https://www.vbox7.com/emb/external.php?vid=", $url);

        return view('episodes/watch', ['episode' => $episode, 'embedUrl' => $embedUrl, 'next' => $nextEpisode, 'previous' => $previousEpisode]);
    }

}
