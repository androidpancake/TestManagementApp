<?php

namespace App\Livewire\Project;

use App\Models\Project as ModelsProject;
use App\Models\TestLevel;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Locked;

class Project extends Component
{
    use WithPagination;

    #[Locked]
    public $projectId;
    public $detail;
    public $title;
    public $description;
    public $load;
    public $chartData;
    public $type;
    public $page;

    public $search;
    public $testlevel = [];
    public $publish = [];

    protected $listeners = ['menuItem'];

    public function mount($load = null, $type = null, $page = null)
    {
        $this->load = $load;
        $this->type = $type;
        $this->page = $page;
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div>
            <!-- Loading spinner... -->
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
        </div>
        HTML;
    }

    public function updatedTestlevel()
    {
        if (!is_array($this->testlevel)) return;

        $this->testlevel = array_filter(
            $this->testlevel,
            function ($testlevel) {
                return $testlevel != false;
            }
        );
    }

    public function updatedPublish()
    {
        if (!is_array($this->publish)) return;

        $this->publish = array_filter(
            $this->publish,
            function ($publish) {
                return $publish != false;
            }
        );
    }

    public function destroy($projectId)
    {
        ModelsProject::find($projectId)->delete();
        return redirect()->route('project');
    }

    public function render()
    {
        $projects = ModelsProject::with(['test_level'])->where('user_id', auth()->id());
        $test_level = TestLevel::all();


        if (!empty($this->search)) {
            $projects->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('jira_code', 'like', '%' . $this->search . '%');
        }

        if (!empty($this->testlevel)) {
            $projects->whereHas('test_level')->where('test_level_id', $this->testlevel);
        }

        if (!empty($this->publish)) {
            $projects->where('published', $this->publish);
        }

        // final
        if (route('dashboard')) {
            $projects = $projects->latest()->paginate(5);
        } else {
            $projects = $projects->latest()->paginate(10);
        }


        return view('livewire.project', [
            'projects' => $projects,
            'test_level' => $test_level
        ])->with([
            'title' => 'Project',
            'description' => 'Please complete the documents to generate reports'
        ]);
    }
}
