<?php namespace App\Http\Controllers;

use App\Episode;
use App\Project;

class EpisodeController extends Controller
{
    public function watchEpisodeSlug($project, $number, $slug)
    {
        $arr = $this->watchEpisodeProcess($project, $number, $slug);

        if (!$arr)
        {
            return view('errors/404');
        }

        return view( 'episodes/watch', $arr );
    }

    public function watchEpisode($project, $number)
    {
        $arr = $this->watchEpisodeProcess($project, $number, null);

        if (!$arr)
        {
            return view('errors/404');
        }

        return view( 'episodes/watch', $arr );
    }

    public function watchEpisodeProcess($project, $number, $slug)
    {
        $project = Project::where('slug', '=', $project)->first();

        if (is_null($slug))
        {
           $episode = Episode::where('project_id', '=', $project->id)->where('number', '=', $number)->first();
        }
        else
        {
           $episode = Episode::where('slug', '=', $slug)->where('number', '=', $number)->first();
        }
            $nextEpisode = Episode::where('project_id', '=', $project->id)->where('number', '=', $number + 1)->first();
            $previousEpisode = Episode::where('project_id', '=', $project->id)->where('number', '=', $number - 1)->first();

        if (is_null($episode) || $episode->stream_link === "")
        {
            flash('Този епизод не съшествува!')->error();
            return false;
        }

        $url = $episode->stream_link;
        $embedUrl = str_replace("https://www.vbox7.com/play:", "https://www.vbox7.com/emb/external.php?vid=", $url);

        return ['episode' => $episode, 'embedUrl' => $embedUrl, 'next' => $nextEpisode, 'previous' => $previousEpisode];
    }
}
