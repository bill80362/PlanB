{{-- 時間差更新檢查用 --}}

@php
    if (!isset($updated_at)) {
        $updated_at = $data?->updated_at ?? null;
    }
@endphp

@if ($updated_at)
    <input type="hidden" class="form-control" name="updated_at" value="{{ $updated_at }}">
@endif
