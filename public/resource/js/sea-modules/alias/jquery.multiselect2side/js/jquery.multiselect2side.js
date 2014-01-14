
(function(){
    var methods = {
        _init: function(el){
            el = $(el);
            var ms2sideSelect = el.find('select[rel=ms2sideSelect]');
            var ms2sideSelected = el.find('select[rel=ms2sideSelected]');

            ms2sideSelect.find('option').live('dblclick', function(){
                var _this = $(this).clone();
                _this.attr('selected','true');
                ms2sideSelected.append(_this);
                $(this).remove()
            })
            ms2sideSelected.find('option').live('dblclick', function(){
                var _this = $(this).clone();
                ms2sideSelect.append(_this);
                $(this).remove()
            })

            var AddOne = el.find('.AddOne');
            var AddAll = el.find('.AddAll')
            var RemoveOne = el.find('.RemoveOne')
            var RemoveAll = el.find('.RemoveAll')

            AddOne.live('click', function(){
                var _this = ms2sideSelect.find('option:selected');
                _this.attr('selected','true');
                ms2sideSelected.append(_this);
            });
            AddAll.live('click', function(){
                var _this = ms2sideSelect.find('option');
                _this.attr('selected','true');
                ms2sideSelected.append(_this);
            });
            RemoveOne.live('click', function(){
                var _this = ms2sideSelected.find('option:selected');
                ms2sideSelect.append(_this);
            });
            RemoveAll.live('click', function(){
                var _this = ms2sideSelected.find('option');
                ms2sideSelect.append(_this);
            });
        }
    };

    $.fn.multiselect2side = function( ) {
        $.each(this, function(i, v){
            return methods._init(v);
        });
    };
})($)