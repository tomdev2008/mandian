

<!--内容区-->
<div class="middle-wrap">
<!--导航-->
<div class="lines-wrap">
    <p>修改用户信息</p>
</div>
<!--/导航-->
<!--内容-->
<div class="content-wrap">
<!--表格-->
<table width="100%" class="table-form contentWrap">
    <tbody>
    <tr>
        <td width="80">用户名</td>
        <td>admin</td>
    </tr>

    <tr>
        <td width="80">最后登录时间</td>
        <td>2013-11-29 10:47:10</td>
    </tr>

    <tr>
        <td width="80">最后登录IP</td>
        <td>127.0.0.1</td>
    </tr>
    <tr>
        <td>真实姓名</td>
        <td>
            <input type="text" value="" size="30" class="input-text" id="realname" name="info[realname]"></td>
    </tr>
    <tr>
        <td>E-mail</td>
        <td><input type="text" value="chchmlml@163.com" size="40" class="input-text" id="email"
                   name="info[email]"></td>
    </tr>
    <tr>
        <td>Language</td>
        <td>
            <select name="info[lang]">
                <option value="zh-cn">中文 - Chinese simplified</option>
                <option value="en">English</option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="button" id="btn" class="button" value="提交">
        </td>
    </tr>
    </tbody>
</table>
<!--/表格-->

<!--查询表单-->
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
    <tr>
        <td>
            <div class="explain-col">
                注册时间：
                <input type="text" readonly="" class="input-text" size="10" value="" id="start_time"
                       name="start_time">&nbsp;
                -
                <input type="text" readonly="" class="input-text" size="10" value="2013-11-29"
                       id="end_time" name="end_time">&nbsp;
                <select name="siteid">
                    <option selected="" value="">所有站点</option>
                    <option value="1">默认站点</option>
                </select>
                <select name="status">
                    <option value="0">状态</option>
                    <option value="1">锁定</option>
                    <option value="2">正常</option>
                </select>
                <select name="modelid">
                    <option selected="" value="">会员模型</option>
                    <option value="10">普通会员</option>
                </select> <select name="groupid">
                    <option selected="" value="">会员组</option>
                    <option value="8">游客</option>
                    <option value="2">新手上路</option>
                    <option value="6">注册会员</option>
                    <option value="4">中级会员</option>
                    <option value="5">高级会员</option>
                    <option value="1">禁止访问</option>
                    <option value="7">邮件认证</option>
                </select>
                <select name="type">
                    <option value="1">用户名</option>
                    <option value="2">用户ID</option>
                    <option value="3">邮箱</option>
                    <option value="4">注册ip</option>
                    <option value="5">昵称</option>
                </select>

                <input type="text" class="input-text" value="" name="keyword">
                <input type="submit" value="搜索" class="button" name="search">
            </div>
        </td>
    </tr>
    </tbody>
</table>
<!--/查询表单-->

<!--列表-->
<div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
        <tr>
            <th width="30px" align="left"><input type="checkbox" onclick="selectall('groupid[]');" id="check_box" value=""></th>
            <th align="left">ID</th>
            <th>排序</th>
            <th>用户组名</th>
            <th>系统组</th>
            <th>会员数</th>
            <th>星星数</th>
            <th>积分小于</th>
            <th>允许上传附件</th>
            <th>投稿权限</th>
            <th>投稿不需审核</th>
            <th>搜索权限</th>
            <th>自助升级</th>
            <th>发短消息</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td align="left"></td>
            <td align="left">8</td>
            <td align="center"><input type="text" value="0" size="1" class="input-text" name="sort[8]">
            </td><td align="center" title="">游客</td>
            <td align="center"><font color="red">√</font></td>
            <td align="center">0
            </td><td align="center">0</td>
            <td align="center">0</td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><a href="javascript:edit(8, '游客')">[修改]</a></td>
        </tr>
        <tr>
            <td align="left"></td>
            <td align="left">1</td>
            <td align="center"><input type="text" value="0" size="1" class="input-text" name="sort[1]">
            </td><td align="center" title="0">禁止访问</td>
            <td align="center"><font color="red">√</font></td>
            <td align="center">0
            </td><td align="center">0</td>
            <td align="center">0</td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><a href="javascript:edit(1, '禁止访问')">[修改]</a></td>
        </tr>
        <tr>
            <td align="left"></td>
            <td align="left">2</td>
            <td align="center"><input type="text" value="2" size="1" class="input-text" name="sort[2]">
            </td><td align="center" title="">新手上路</td>
            <td align="center"><font color="red">√</font></td>
            <td align="center">0
            </td><td align="center">1</td>
            <td align="center">50</td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><a href="javascript:edit(2, '新手上路')">[修改]</a></td>
        </tr>
        <tr>
            <td align="left"></td>
            <td align="left">4</td>
            <td align="center"><input type="text" value="4" size="1" class="input-text" name="sort[4]">
            </td><td align="center" title="">中级会员</td>
            <td align="center"><font color="red">√</font></td>
            <td align="center">0
            </td><td align="center">3</td>
            <td align="center">150</td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><a href="javascript:edit(4, '中级会员')">[修改]</a></td>
        </tr>
        <tr>
            <td align="left"></td>
            <td align="left">5</td>
            <td align="center"><input type="text" value="5" size="1" class="input-text" name="sort[5]">
            </td><td align="center" title="">高级会员</td>
            <td align="center"><font color="red">√</font></td>
            <td align="center">0
            </td><td align="center">5</td>
            <td align="center">300</td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><a href="javascript:edit(5, '高级会员')">[修改]</a></td>
        </tr>
        <tr>
            <td align="left"></td>
            <td align="left">6</td>
            <td align="center"><input type="text" value="6" size="1" class="input-text" name="sort[6]">
            </td><td align="center" title="">注册会员</td>
            <td align="center"><font color="red">√</font></td>
            <td align="center">0
            </td><td align="center">2</td>
            <td align="center">100</td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><font color="red">√</font></td>
            <td align="center"><a href="javascript:edit(6, '注册会员')">[修改]</a></td>
        </tr>
        <tr>
            <td align="left"></td>
            <td align="left">7</td>
            <td align="center"><input type="text" value="7" size="1" class="input-text" name="sort[7]">
            </td><td align="center" title="">邮件认证</td>
            <td align="center"><font color="red">√</font></td>
            <td align="center">0
            </td><td align="center">0</td>
            <td align="center">0</td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><font color="blue">×</font></td>
            <td align="center"><a href="javascript:edit(7, '邮件认证')">[修改]</a></td>
        </tr>
        </tbody>
    </table>

    <div class="btn"><label for="check_box">全选/取消</label> <input type="submit" onclick="return confirm('您确定要删除吗？')" value="删除" name="dosubmit" class="button">
        <input type="submit" value="排序" onclick="document.myform.action='?m=member&amp;c=member_group&amp;a=sort'" name="dosubmit" class="button">
    </div>
    <div id="pages"></div>
</div>
<!--/列表-->
</div>
<!--/内容-->
</div>
<!--/内容区-->
