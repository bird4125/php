<div class="board_write auto-center">
    <form action="" method="post">
        <fieldset>
            <legend>글작성</legend>
            <input type="hidden" name="action" value="<?php echo $action?>">
            <h3>글작성</h3>
            <div class="table">
                <div class="tr">
                    <div class="lbl"><label for="board_name">작성자</label></div>
                    <div class="desc"><input type="text" id="board_name" name="name" size="20" title="작성자" required autofocus value="<?php echo $name?>"></div>
                </div>
                <div class="tr">
                    <div class="lbl"><label for="board_pw">비밀번호</label></div>
                    <div class="desc"><input type="password" id="board_pw" name="pw" size="20" title="비밀번호" required></div>
                </div>
                <div class="tr">
                    <div class="lbl"><label for="board_subject">제목</label></div>
                    <div class="desc"><input type="text" id="board_subject" name="subject" size="80" title="제목" required value="<?php echo $subject?>"></div>
                </div>
                <div class="tr">
                    <div class="lbl"><label for="board_content">내용</label></div>
                    <div class="desc"><textarea id="board_content" name="content" cols="80" rows="10" title="내용" required><?php echo $content?></textarea></div>
                </div>
            </div>
            <div class="btn_group">
                <a class="btn-default" href="<?php echo $this->param->get_page?>">취소</a>
                <button class="btn-submit" type="submit">완료</button>
            </div>
        </fieldset>
    </form>
</div>