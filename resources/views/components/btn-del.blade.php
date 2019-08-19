@php($id_attr = 'modal-delete-' . $controller . '-' . $id)

{{-- 削除ボタン --}}
<button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#{{ $id_attr }}">削除</button>

{{-- モーダルウィンドウ--}}
<div class="modal fade" id="{{ $id_attr }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id_attr }}-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id_attr }}-label">削除の確認</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div><!-- /.modal-header -->
            <div class="modal-body">
                <p>本当に削除してもよろしいですか？</p>
                <p><strong>{{ $name }}</strong></p>
            </div><!-- /.modal-body -->
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">キャンセル</button>
                {{-- 削除実行フォーム --}}
                <form action="{{ url($controller . '/' . $id) }}" method="post">
                    @csrf
                    @method('DELETE')
{{--                    <input type="hidden" name="{{ substr($controller, 0, -1) . '_id' }}" value="{{ $id }}">--}}
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </div><!-- /.modal-footer -->
        </div>
    </div>
</div>
