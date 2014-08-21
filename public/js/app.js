window.App = Ember.Application.create({
        LOG_TRANSITIONS:true,
        LOG_TRANSITIONS_INTERNAL:true,
        LOG_ACTIVE_GENERATION: true,
        LOG_VIEW_LOOKUPS:true
});
App.Router.map(function() {
    this.resource('goals', function(){
    this.route('new');
    });
    this.resource('goal', {path: 'goal/:id'},function(){
        this.route('new');
//        this.route('edit');
    });
    this.route('test')
});
var car = Ember.Object.create({
    type:'BMW'
});
var testController = Ember.ObjectController.create({
    model:car
});
App.TestView = Ember.View.extend();
App.TestView.reopen({
    template:Ember.Handlebars.compile('<p>hhh{{type}}</p>'),
    controller:testController
});
App.TestView.create();

App.GoalsRoute = Ember.Route.extend({
    model:function(){
         return App.GoalsHolder.findAll();
    }
});
App.GoalRoute = Ember.Route.extend({
    model:function(params){
  return App.GoalHolder.findAll(params.id);
    }
});
App.Goals = Ember.Model.extend({
    name:Ember.attr(),
    description:Ember.attr(),
    deadline:Ember.attr()

});
App.Goals.adapter = Ember.Adapter.create({
    findAll: function(klass,records){
        return $.getJSON('/goals')
            .then(function(data){
            records.load(klass,data.goals)
            });
    }
});
App.AlertView = Ember.View.extend({
    templateName:'_alert',
    classNameBindings:['defaultClass','content.kind'],
    defaultClass: 'alert-box success',
    kind:null,
    controllerBinding:"content",
    click:function(){
        var that = this;
        this.$().fadeOut(300,function(){that.removeFromParent();});
    },
    didInsertElement:function(){
        this.$().hide().fadeIn(300).delay( 5000 ).fadeOut(300);
    }
});
App.FlashListView = Ember.CollectionView.extend({
    itemViewClass:'App.AlertView',
    contentBinding:'App.flashController'
});
App.FlashController = Ember.ArrayController.extend();
App.flashController = App.FlashController.create({content: Ember.A()});

App.GoalsHolder = Ember.Object.extend();
App.GoalsHolder.reopenClass({
    pages:null,
    findAll: function(){
         links = [];
        var that = this;
    return $.ajax({
        type: "get",
        url: '/goals',
        success: function(t){ },
        dataType: 'json'
    }).then(function(data){
        data.goals.forEach(function(child){
          links.pushObject(App.GoalsHolder.create(child))
        });

return links;
    });
    }
});
App.GoalHolder = Ember.Object.extend();
App.GoalHolder.reopenClass({
    pages:null,
    findAll: function(id){
        targets = [];
        var that = this;
    return $.ajax({
        type: "get",
        url: '/goals/'+id,
        success: function(t){ },
        dataType: 'json'
    }).then(function(data){
            data.targets.forEach(function(child){
                targets.pushObject(App.GoalHolder.create(child))
            });

            return [targets,data.goals];
    })
    }
});
App.GoalController = Ember.ArrayController.extend({
    ch:function(){
       return this.get('model')[1];
    }.property('model'),
    chh:function(){
       return this.get('model')[0];
    }.property('model'),
    amodel:function(){
        console.log(this.get('afterModel'));
    }.property('afterModel'),
    done:function(){
        var description = this.get('model')[1].description;
        var id = this.get('model')[1].id;
        $.ajax({
            type: "PUT",
            url: '/goals/'+id,
            data:{description:description},
            success:function(data){
               console.log(data);
            },
            error:function(){
                App.flashController.pushObject(Ember.Object.create({
                    message:"Sorry something went wrong!",
                    kind:'alert'
                }));
            }
    });
    }
});
App.GoalsController = Ember.ArrayController.extend({
    offset:0,
    limit:5,
arrangedContent:function(){
    var offset = this.get('offset'),
        limit = this.get('limit');
return this.get('model').slice(offset,offset+limit);
}.property('model.@each','offset','limit'),
    didInsertElement: function() {
    jQuery('.button').addClass('animated bounceInLeft')
    },
    prevPage:function(){
        var limit = this.get('limit');
        if(this.get('hasPrevPage')){
            this.decrementProperty('offset',limit);
        }
    },
    nextPage:function(){
        var limit = this.get('limit');
        if(this.get('hasNextPage')){
            this.incrementProperty('offset',limit);
        }
    },
    hasPrevPage:function(){
return this.get('offset') !== 0;
    }.property('offset'),
    hasNextPage:function(){
        var total = this.get('offset')+this.get('limit');
    return this.get('model.length') >= total;
    }.property('model.length','limit','offset'),
    pushSort:function(attribute){

        if(this.get('sortProperties.firstObject') == attribute){
            this.toggleProperty("sortAscending")
        }else{
            this.set('sortProperties',[attribute]);
            this.set('sortAscending',true);
        }
    }
});
App.GoalsNewController = Ember.ObjectController.extend({
    addGoal: function(){
        var name = this.get('name');
        var description = this.get('description');
//        console.log(this.incrementProperty(this.get('model').get('lastObject').id,1));
        var lastId=this.get('model').get('lastObject');
        console.log(lastId);
        var id = lastId.id + 1;
        var that = this;
        this.set('errorname','');
        this.set('errord','');
        $.ajax({
                      type: "post",
                      url: '/goals',
                      data:{name:name, description:description},
                      success:function(data){
                          if(typeof(data) == "number"){
                              links.pushObject(App.GoalsHolder.create({id:id,name:name,description:description}));
                              that.set('name','');
                              that.set('description','');
                              that.transitionTo('goals');
                              App.flashController.pushObject(Ember.Object.create({
                                  message:"You added successfully a new goal!"
                              }));

                          }else{
                              (typeof data.name!=='undefined')?that.set('errorname',data.name[0]):'';
                              (typeof data.description!=='undefined')?that.set('errord',data.description[0]):'';
                     }
            },
           error:function(){
               App.flashController.pushObject(Ember.Object.create({
                   message:"Sorry something went wrong!",
                   kind:'alert'
               }));
           },
            dataType:'json'
        });
    },
    cancel:function(){
        this.set('errorname','');
        this.set('errord','');
        return  this.transitionToRoute('goals');
    }
});
App.GoalNewController = Ember.ArrayController.extend({
    addGoal: function(id){
        var name = this.get('targetv');
        var id = this.get('model')[1].id;
        var description = this.get('time');
        var add = this.get('fff');
        console.log(add);
        if(add !== undefined){
            console.log('success');
        }
        var that = this;
        this.set('errorname','');
        this.set('errord','');
        $.ajax({
                type: "post",
                url: '/targets',
                data:{id:id,target:name, time:description},
                success:function(data){
                        targets.pushObject(App.GoalHolder.create({target:name,time:description}));
                        that.set('targetv','');
                        that.set('time','');
                        that.transitionTo('goal');
                        App.flashController.pushObject(Ember.Object.create({
                            message:"You added successfully a new target!"
                        }));
                }});
    },
    cancel:function(id){
        this.set('errorname','');
        this.set('errord','');
        return  this.transitionTo('goal');
    }
});
App.Buttons = Ember.Component.extend({
    templateName:'buttons'
});
App.GoalNewView = Ember.View.extend({
    templateName: 'aaa'
});
App.PartGoal = Ember.View.extend({
    templateName: 'bbb'
});
Ember.Handlebars.helper('plusOne', function(number) {
    return number + 1;
});
Ember.Handlebars.helper('dynamic', function(number) {
    var a ='<input type="text" valueBinding="ggg" placeholder="GGG" id="ggg">';
    return a;
});
var acontainer = Ember.ContainerView.create({
    init: function() {
        this._super();
        this.pushObject(App.FirstView.create());
        this.pushObject(App.SecondView.create());
    }
});
acontainer.append('body');
App.FirstView = Ember.View.extend({
    templateName: 'first'
});
App.SecondView = Ember.View.extend({
    templateName: 'second'
});
App.EmberGoalsComponent = Ember.Component.extend({
    inputs:[1,2,3,4],
    name:'Plamen Yankov',
    didInsertElement:function(){
        console.log('hello');
    }
});