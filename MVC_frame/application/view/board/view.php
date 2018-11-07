<div class="board_view auto-center">
<h3>글보기</h3>
<div class="table">
<div class="tr">
<div class="lbl">작성자</div>
<div class="desc"><?php echo $data->name?></div>
</div>
<div class="tr">
<div class="lbl">제목</div>
<div class="desc"><?php echo $data->subject?></div>
</div>
<div class="tr">
<div class="lbl">내용</div>
<div class="desc content"><?php echo nl2br($data->content)?></div>
</div>
</div>
<div class="btn_group">
<a class="btn-default" href="<?php echo $this->param->get_page?>">목록</a>
<a class="btn-submit" href="<?php echo $this->param->get_page?>/write/<?php echo $this->param->idx?>">수정</a>
<a class="btn-submit" href="<?php echo $this->param->get_page?>/delete/<?php echo $this->param->idx?>">삭제</a>
</div>
</div>