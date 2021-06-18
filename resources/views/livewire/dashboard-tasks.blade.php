@if(!$tasks->isEmpty())
<div class="row">
    @foreach($tasks as $task)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card shadow-none bg-transparent @if($task->delayed()) border-danger @else border-success @endif">
                <div class="card-body">
                    <h4 class="card-title @if($task->delayed()) text-danger @else text-success @endif" style="height: 42px; overflow: hidden;">
                        {{ $task->getTitleAbbr() }}
                    </h4>
                    <p class="card-text" style="max-height: 125px; overflow: hidden;">{{ $task->getDescriptionAbbr() }}</p>
                    <p><strong>Prazo:</strong> {{ $task->date }} - {{ $task->hour }}</p>
                    <p><strong>Responsável:</strong> {{ $task->user->name }}</p>
                    <div>
                        <a class="btn btn-primary btn-sm" href="{{ route('tasks.show', $task->id) }}">
                            <i data-feather="eye"></i> {{ __('actions.show') }}
                        </a>
                        <button class="btn btn-success btn-sm" wire:click="finished({{ $task->id }})">
                            <i data-feather="check"></i> {{ __('actions.finished') }}
                        </button>
                        <button class="btn btn-danger btn-sm" wire:click="delete({{ $task->id }})">
                            <i data-feather="trash"></i> {{ __('actions.delete') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-md-12">
        {{ $tasks->links() }}
    </div>
</div>
@else
    <div class="row">
        <div class="col-12">
            <div class="alert alert-primary" role="alert">
                <div class="alert-body">
                    Nenhuma tarefa cadastrada.
                </div>
            </div>
        </div>
    </div>
@endif
