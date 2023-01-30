@if (Session::get('user_id'))
    @if (in_array($gid, $mysavegigs))
        <button type="button" class="btn btn-secondary" title="Remove From Saved"
            onclick="addtolike({{ $gid }}, 0)">
            <i class="fa fa-heart"></i>
        </button>
    @else
        <button type="button" class="btn btn-secondary" title="Add to Saved" onclick="addtolike({{ $gid }}, 1)">
            <i class="fa fa-heart-o"></i>
        </button>
    @endif
@else
    <button type="button" class="btn btn-secondary"  title="Add to Saved" onclick="javascript:alert('You must login to save this gig in your favourite list.')">
         <i class="fa fa-heart-o"></i>
     </button>
@endif
