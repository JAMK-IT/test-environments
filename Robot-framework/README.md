## Robot Framework Stack

![](http://qitaos.coding.me/img/logo.png)  

##### Table of Contents
[Robot Framework](#robot framework)    
[Docker](#docker)  
[Installation](#installation)  
[Time tracking](#time-tracking)   
[Communication channel](#communication-channel)    
[Work organization](#work-organization)  
[Documentation tools](#documentation-tools)  
[Tool integrations](#tool-integrations)  
[Mockups](#mockups)  
 [NinjaMock](#ninjamock)  
 [Fluid UI](#fluid-ui)  
[Managing the code](#managing-the-code)  
[Continuous Integration and Deployment](#continuous-integration-and-deployment)  
[Platform for App Deployment](#platform-for-app-deployment)  
[Feedback](#feedback)  
[References and Links](#references-and-links)  
[Questions & Answers](#questions-and-answers)

# Robot Framework
(aka. Wat?)

Robot Framework is acceptance testing-framework. It was developed by Nokia Networks, but now its sponsored by [Robot Framework Foundation](http://robotframework.org/foundation/).  
Robot Framework is a generic test automation framework for acceptance testing and acceptance test-driven development (ATDD).  
Acceptance testing is usually a last step of development chain, where application is reviewed and checked that its working as it should.  
Robot Framewrok utilizes tabular syntax for tests and allows keyword-driven approaches, so basically tests could be also Use Cases!  

Selenium is testing framework for web applications and Selenium2Library is Robot Frameworks library.  
Together they create powerful framework , which can be used to test web-applications and sites. Tests can be automated on any build server, so Robot Framework fits perfectly into a continous integration chain.  

Check links:  
[Robot Framework](http://robotframework.org/).  
[ATDD](https://en.wikipedia.org/wiki/Acceptance_test%E2%80%93driven_development)  
[TDD](https://en.wikipedia.org/wiki/Test-driven_development)  

# Docker

Shortly. Docker is a tool to create, deploy, and run applications by using containers. Containers allow to package up an application with all of the needed libraries and dependencies. This assures that the application will be working on any other Linux-based machine regardless of machine configuration.  

Check link:  
[Docker](https://www.docker.com/).  

![](http://www.itzgeek.com/wp-content/uploads/2015/01/Docker-Logo.png)  


# Installation

First login to your virtual machine and install docker with following steps: [docs.docker.com](https://docs.docker.com/engine/installation/).  

### Optional NGINX  
If you dont have apache or nginx installed in your vm, pull NGINX image [Gitlab.com/jamkit](https://gitlab.com/JAMKIT/nginx-basic).  

```  
sudo docker pull registry.gitlab.com/jamkit/nginx-basic:latest
```    

Lets have look what parametres you need to give to NGINX container.  
```
--name: Container name, could be anything..
-p: Container port and public port
-v: Volumes from! This is important!! modify first string before : to match your test folder path!!!
```  

Next start NGINX container using following command:  
```
sudo docker run --name nginx -p 80:80 -d -v /opt/rfw-tests:/usr/share/nginx/html jamkit/nginx-basic  
```  

Navigate to your ip:80 and make sure that NGINX is working.  


## Robot framework container

Pull latest Robot Framework image from [Gitlab.com/jamkit](https://gitlab.com/JAMKIT/Robot-framework-standalone).  








## Work organization

![Gitlab Board](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/gitlab.png)

Gitlabs Board view can be effectively used for tracking progress of your project.

Remember that only users in your repository can view and edit board!

## Time tracking

Every project needs time tracking, nothing else to say. There are many great free softwares for that but in this case we use Toggl.
Let's navigate to https://toggl.com/ and sign up. After that create new project.

On Timer section on the left, you can start clock when you start working some task or set it manually afterwards.

In Dashboard and Reports section, you can explore projects time tracking charts. Charts can be sorted by current user or team and timeline goes day up to one year.

You can invite team members under Manage/Team by typing members emails.

![Cooper toolchain](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/toggl_dash.png)

## Communication channel

One of the most important cornerstones in every teams' ability to work together is communication. Our project has tried a couple of different platforms for communication, and we are currently using Slack. Slack is versatile, configurable, can be integrated with several other tools and most importantly, it is free. So let's go ahead and establish our own communication project for our project in our next step.

![Slack create a new team](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-06%2015%3A09%3A41.png)

Let's navigate to https://slack.com/ and create a new team. To create a new team sign up with your email address. It is completely up to you if you want to receive email notifications about Slack service.

After you've named your Slack channel, you have to create an url to be able to access it. You might want to use a bit more imagination to create something a bit more practical and compact than what's used in this example, but please keep in mind that URL has to be unique so in cases of very short URLs you might be limited by addresses already reserved by other users.

In the last step of creating our slack channel you'll choose your username. It is tough to give recommendations on this one, although you might want to steer away from too complicated or offensive usernames, just in case. In this example I decided to stay on my very imagination-limited path.

![Slack confirm account details](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-06%2015%3A23%3A35.png)

In case everything went well so far, you'll have a chance to see your choices so far and confirm that this is indeed what you'll want to do. If you are confident on your choices, by pressing the button below you are able to establish your own Slack channel, and start inviting people to it.

Now you can start customizing your fresh communication channel. Enabling desktop notifications is optional, but helps quite a lot in being able to notice urgent messages that are being sent to you over Slack. Slack also has mobile applications if you get a feeling that you'd like to be available better or there's one tab too many open in your web browser. Either way setting your Slack channel up is pretty simple. With “invite people” you'll be able to add members to your communication channel. At the time of writing, “full member” is the only available account type for free Slack accounts.

![Invite people to Slack team](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-06%2015%3A30%3A22.png)

 ![Creating a new channel](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-06%2015%3A34%3A47.png)

It is possible that you can manage with the channels that have already been provided to you by default, but at least in case your team has several teams with different purposes within it (teamception?) it is possible to create new public/private channels for controlling the conversation. Or you can just create different channels for different topics if you want. Creating a private channel allows you to strictly decide who gets to participate in conversation, and the rest of users will not be able to see this private channel without invitation.

Once you've created your Slack channel, you'll receive an email that asks you to set a password for your account. You should do that to avoid being confused by the fact that when you try to log back in to your channel it will prompt you for a password, which you have not even set, thus making it impossible for you to login before the password has been set.

After you've added a password for your Slack account, it is recommended to add this password to your password management of choice. You might want to write your domain name and other information about your Slack channel somewhere to avoid confusion for example in case you want to log in to your channel from other device.


## Documentation tools

Lucidchart can be used for making diagrams and you can think of it as a free replacement to Microsoft Visio. There are lots of free alternatives to programs like this, but compared to Dia, for example, Lucidchart has a benefit that it's online-based and this makes sharing your diagrams with your team and other parties a lot easier.

![Lucidchart front page bar](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-09%2015%3A02%3A08.png)

![Lucidchart free account](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-09%2015%3A02%3A49.png)

![Lucidchart account creation](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-09%2015%3A21%3A14.png)

From the front page click “sign up free” and in the next screen below the paid subscriptions you can find option to start free account. Free accounts have some complexity restrictions in diagrams and other hindrances, but it should be fine for most small project cases. Lucidchart includes a lot of templates you can use for making your diagrams easier, and tips and tutorials can be useful if you don't know how to start. In the main screen you can create new diagrams or edit existing ones. 

As you can probably see pretty soon, the default forms and shapes won't get you very far. Therefore it is good that you can add more shape libraries by clicking “more shapes” in the lower left corner and choosing the libraries you believe are useful to your use case. Then save and you are free to start creating diagrams. In the upper left corner you can name your flowchart and just below it, next to “file” menu you can see Lucidchart icon. By clicking it you can activate “Go to documents” option, which returns you back to the main screen. 

Hint: When you create a new shape that has been equipped with a default name, you can double click this name to modify it. Same actually applies to lines you can draw between items; you can double click somewhere along the line to make a text box on the point of click.
Hint 2: When using a background for your other icons, for example the cloud in this topology image, it is recommended to first create, name and arrange icons and then add the background and send it to background with mouse button 2 menu. Otherwise Lucidchart might get confused with the object user wants to interact with.

Here's a quickly made example wannabe-topology that is ugly and crude and has no deeper meaning. It's here just as an example of typical scenario when you would need Lucidchart: drawing topology images.

![Topology made with Lucidchart](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-10%2011%3A43%3A45.png)

## Tool integrations

Zapier is a tool that can be used for many purposes. Most commonly, it is used to create integrations between services that do not have native support in themselves to be integrated. Of course, integrations done with Zapier are not as well-executed as official implementations, but in some cases if you simply want some of your tools to transmit data into another the Zapier is the way to go. In our use case we have at some point of our project used Zapier for transferring our UserVoice tickets to our GitHub issues.

# Mockups

![Mockup as a part of rapid development process](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-12-14%2010%3A26%3A38.png)  
This is a figure describing Agile DevOps -like process cycle. Use of Mockup-tools can be seen as one part of the whole process. [Reference 1](#R1)

## NinjaMock

![NinjaMock front page](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-13%2011%3A09%3A28.png)

![NinjaMock project selection](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-13%2011%3A10%3A07.png)

![NinjaMock user interface](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-13%2011%3A10%3A48.png)

![NinjaMock create account](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-13%2011%3A13%3A44.png)

For designing our first piece of software we can use a wide variety of tools. We've introduced two tools here you can choose from. Just look at the pictures to get a good look at how their UI works and make your decision. Of course nothing prevents you from making a mockup with both tools and then choosing the one that better suits your style. First up, in this guide we introduce NinjaMock. We start up by clicking “start designing now” on the front page, choosing our platform, in this case preferrably www, and then we are already on the design interface. At this point we'd probably want to create and account from the top right corner to maintain our progress. After creating an account you create a new project and again, choose your platform of choice and you're back in program user interface, this time logged in with your account. 

![Big red button original](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-13%2012%3A29%3A08.png)

![Big red button well done](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-13%2012%3A48%3A08.png)

![NinjaMock page linking](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-13%2012%3A53%3A15.png)

In this example we created a very simple point of interaction, a big red button you can press. First we take two circles from shapes, one larger than the other, the same height and width per circle. Then we set them on top of each other, set colours from fill brush via menu. You can add labels via basic menu on the left, and make your object clickable by adding a click spot. After that create a new page from the bottom of the page by pressing “add portrait page” button. 

The easiest way to do what we're about to do here is to select the button and its texts in their entirety and copy them to page 2, but you might want to remove clickable area from your button before copying. Try to set the button on page 2 into same place where it is on your page 1 by following height and vertical movement indicators. After you've done this you can add the clickable area again to page 1 and link it to page 2. 

Change the texts on page 2 so you can clearly see that the page changes when you click on the link you have created. Now you can preview your page from preview button on upper right corner and see if your mockup works as it should. It is good to know that if you just link the circle to next page, you may notice that clicking the text area does nothing. This can be fixed by clicking the text areas and adding a page link to them too. 

## Fluid UI

![Fluid UI account creation](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-12-07%2013%3A34%3A03.png)

Another good alternative for making mockups is Fluid UI. In this case we've created exactly the same mockup as in NinjaMock, so there's no need for doing this again if you've already designed your prototype in NinjaMock, and this is just an alternative method. We just wanted to introduce you two different types of software for doing mockups because the approach to creating mockups is a bit different between NinjaMock and Fluid UI. 

![Fluid UI interface](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-12-07%2013%3A39%3A10.png)

The process of creating our simple big red button is pretty straightforward here. You just choose and drag circle from Icons menu and resize it to your liking. Then by clicking the shape you get a menu where you can change its color and other options. Then use the visual cues to center your shape on the screen and align two circles on top of each other so that the one that is below is gray and the one on top is red. Using other colours is not strictly forbidden if you'd rather experiment with other colours. Then we'll continue by adding textboxes from Text menu. I chose medium size for the upper text and large for one at the bottom. You may edit and change colours for these boxes by clicking them and accessing the menu. After you're satisfied with your results you may continue by cloning the page and create another page where you'll get when you've linked your two pages. 

![Tips for user](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-12-07%2013%3A54%3A29.png)

![Fluid UI linking](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-12-07%2013%3A58%3A03.png)

![Linking process](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-12-07%2013%3A58%3A31.png)

You'll likely get useful tips while creating your wireframe, so remember to access them, for there's a good chance they'll make your work easier. In Fluid UI you link objects, or widgets simply by clicking the widget and then “Link”. Then you'll have the option to choose where your widget of choice leads. Then preview your mockup to see if it works just as it should. As in NinjaMock, here you should also link your textboxes to next page to prevent them from being unclickable objects on your circle.

## Managing the code

Gitlab is a very important tool for managing your code and making it easily accessible to use in various environments. Create your account by clicking “sign up” and provide the account with your user information. After adding some of your account information confirm your email via link that you've received to your accounts' address and feel free to explore how Gitlab works. After our Gitlab account has been set up and has a repository to work on, we are set to configure our CI-pipeline.
![Cooper toolchain](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/gitlab.png)
## Continuous Integration and Deployment

At this point it is recommended to create Heroku account as displayed in the next chapter. After that, continue from the next section.

After you've deployed your code to your Gitlab repository, it is time to get our Gitlab and Heroku environments working together. To accomplish this and get the tests run appropriately, we made a dummy file with javascript for the test to pass and deployment to Heroku work. You can see our implementation in https://gitlab.com/JAMKIT/Cooper-product-line-example -repository. Now, at this point we assume that you are the owner of the repository you're about to use Gitlab-CI for Heroku deployment, you have some code in your Gitlab repository and you have Heroku account created. You'll also need some kind of simple test to pass deployment phase if you want your code to be deployed to Heroku. You can see the example from our repository stated earlier for our dummy test. 


If you've not yet created Heroku account feel free to do it now and then return to this part. Next up you'll be linking Gitlab and Heroku accounts so that Gitlab runners will be able to deploy your code to Heroku as a working app. From the Gitlab repository, click the Set Up CI button or edit gitlab-ci.yml file. After that you're going to need Heroku API key from Heroku account. Next you set up Gitlab-ci.yml file if it allready exists. Shortly, you need to config runner to know what to do. In our case we use public runners, but feel free to configure your own if you want. In .yml file, set up dpl deployment tool, its dependencies, Heroku app name and API key. You can look example in JAMKIT gitlab repository. After that you're good to go.

## Platform for App Deployment

![Heroku account creation](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-27%2014%3A36%3A48.png)

![Heroku account creation finished](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-11-27%2014%3A55%3A09.png)

Heroku is our site of choice for building our app in working condition. This is basically where our application is deployed after being tested and compiled. To create your account click “Sign up for free” and once again, fill in the necessary information to get your account initiated. If you already have in mind what programming language you're about to use for your project then go ahead and select it from the menu, but Heroku also has couple of options in case you're not so sure. After filling out the account information you'll be asked to confirm your email account. After confirming your account you'll be prompted to set password to your account. Do so and log in.

Create new app in Heroku. Locate your personal API key under Account settings.

## Feedback

Choosing a user feedback system is a bit more complicated issue. We used UserVoice for quite a while to collect feedback from our Contriboard, and as integration with our issue listing was not possible from the start, we used Zapier to export our feedback tickets from UserVoice into GitHub issues. We were satisfied with UserVoice and it served us well. However, since then things have become a bit more complicated. UserVoice has changed its payment model drastically. When we used it they had free account option that was limited in some functionalities but didn't have any kind of trial period or something that was severely limiting our basic usage. Since then they have moved to radically different pricing methods. Now they have 14 day free trial and first pricing option starts from 499$ a month. So now we're in a situation where we'll have to find another free alternative that has the necessary integrations or implement those integrations manually with Zapier.

![Doorbell.io front page](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-12-08%2012%3A07%3A00.png)

One simple option we tried was Doorbell.io, se we decided to add it to this guide. In all its simplicity, create an account, create a new application by pressing “+” -button next to your user account in the upper right corner of the site and name your application. Then you'll be given a piece of JavaScript code that you can add to your application that you want feedback from. The feedback you'll receive will be added to your Doorbell.io account. In our case the best option will be of course to add this piece of code to Gitlab repository in our application, and then deploy it with Gitlab-CI to Heroku. After that you can get feedback from your application.

![Doorbell.io application added](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-12-08%2013%3A38%3A02.png)

![Doorbell.io feedback](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-12-08%2013%3A35%3A05.png)

![Application deployed to Heroku with feedback](https://raw.githubusercontent.com/JAMK-IT/DOC10-example-project/master/images/Screenshot%20from%202015-12-08%2013%3A19%3A21.png)

And here we have our application deployed to Heroku with feedback feature! [Cooper application](https://doc10-example-project.herokuapp.com/)

## References and Links

Sutinen, H. 2014. Rapid design using web based UI design tools : Case: Contriboard.    
<http://urn.fi/URN:NBN:fi:amk-2014121219576>

Several writers, 2015. Work Packages - Digile N4S.  
<http://www.n4s.fi/en/work-packages>

Several writers, 2015. DevOps - Wikipedia, the free encyclopedia.  
<https://en.wikipedia.org/wiki/DevOps>

Several writers, 2015. What is DevOps? | the agile admin.  
<http://theagileadmin.com/what-is-devops>

Several writers, 2015. Continuous delivery - Wikipedia, the free encyclopedia.     
<https://en.wikipedia.org/wiki/Continuous_delivery>

Several writers, 2015. Continuous integration - Wikipedia, the free encyclopedia.      
<https://en.wikipedia.org/wiki/Continuous_integration>

Fowler, M. 2006. Continuous integration.  
<http://martinfowler.com/articles/continuousIntegration.html>


## Questions and Answers



