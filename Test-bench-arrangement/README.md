# Test environment  

Test environment runs in JAMK's subnet called LABRANET. Test enviroment consist of multiple virtual machines and one physical host. Every machine runs Ubuntu 14.04 or 16.04 and every machine has Docker engine and docker-compose installed. VMware ESXi runs virtual machines and host called Rancher-m1 is dedicated to run Rancher server. Rancher server is container based application for container orchestration.  

Docker is installed using follow instructions: [Docker installation](https://docs.docker.com/engine/installation/)  
Rancher is installed using below instructions: [Rancher installation](https://docs.rancher.com/rancher/v1.4/en/installing-rancher/installing-server/#single-container)  



env IMAGE


In our setup Rancher has two different enviroments. Environments are Cattle based. One for hosts that are used only running defined containers and one for running any containers.  
Now u think what is Cattle? Shortly, Cattle is orchestration engine for rancher.  
More info available at: [Github.com/rancher](https://github.com/rancher/rancher/wiki)  

Hosts can be added using Rancher add host command.  

IMAGE  

After running command on host, host automatically pulls Rancher-agent container and joins part of Rancher Cattle.  


HSOTS IMAGE  


User can launch containers using Ranchers add stack command or straight from hosts command line using docker commands.  
add stack IMAGE  

Rancher automatically selects host with lowest load or with free ports for your containers (if you have defined ports in your compose file).  
User can also use tags to define wanted hosts for containers.  


# Technologies  

## Docker

Shortly. Docker is a tool to create, deploy, and run applications by using containers. Containers allow to package up an application with all of the needed libraries and dependencies. This assures that the application will be working on any other Linux-based machine regardless of machine configuration.  

Check link:  
[Docker](https://www.docker.com/).  


![](http://www.itzgeek.com/wp-content/uploads/2015/01/Docker-Logo.png)  

## Rancher
 
Rancher is an open source project that provides a complete platform for operating Docker in production. Rancher provides infrastructure services like multi-host networking and load balancing. It integrates native Docker management capabilities such as Docker Machine and Docker Swarm.

More info at: [Rancher](http://rancher.com/)

![](https://raw.githubusercontent.com/JAMK-IT/test-environments/master/images/icon-rancher.png)  


# Network diagram  
 
![](https://raw.githubusercontent.com/JAMK-IT/test-environments/master/images/network3.png)  
