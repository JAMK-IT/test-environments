### Locust test bench

![](https://pbs.twimg.com/profile_images/1867636195/locust-logo-orignal.png)  

##### Table of Contents
[Locust](#locust)   
[Test cases](#test-cases)  
[Locust container](#locust-container)  
[Deployment diagram](#deployment-diagram)


## Locust
(aka. Wat?)

[Locust](http://locust.io/) is open source load testing tool written in Python. Locust is web-oriented and tests are written in Python. Locust main purpose is to emulate real users and traffic so you can know your application stability and maximum operting capacity.  
Locust is event-based so its possible to run thousands of concurrent users on a single host.  
Locust tests are also possible to run distributed over multip le machines.  

Check links:  
[Understanding Load Testing](https://smartbear.com/learn/performance-testing/what-is-load-testing/)  
[Load testing](https://en.wikipedia.org/wiki/Load_testing)  
[Performance testing](https://en.wikipedia.org/wiki/Software_performance_testing)  
[Stress testing](https://en.wikipedia.org/wiki/Stress_testing)  


## Test cases  

Next write some test cases or clone contriboard tests from gitlab etc.  

Official locust documention for writing locusfiles can be found at [here](http://docs.locust.io/en/latest/writing-a-locustfile.html).   
Contriboard locust test can be found at [JAMKIT gitlab page](https://gitlab.com/JAMKIT/Locust-tests.git).  

## Locust container

First login to your virtual machine and install docker with following steps: [docs.docker.com](https://docs.docker.com/engine/installation/).  
  
You can run container with or and without webUI! If you choose with, then u have to manually add parameters in browser but you see test execution live. WebUI can be found: ip:8089    


![](https://raw.githubusercontent.com/JAMK-IT/test-environments/master/images/testi2.png)  


Below you find two examples.  



Example1 without webUI.  
```
LOCUST_FILE_PATH = Path of your test file
LOCUST_TARGET_HOST = Target host (look right syntax below)
LOCUST_LOCUSTFILE = Name of your test file
LOCUST_NUM_REQUEST = Number of request until test exist
LOCUST_USERS = Number of concurrent users
LOCUST_HATCH_RATE = Hatch rate in seconds
LOCUST_REPORT = Path of report
-v = volumes from! change path before : to mount that dir to container
```  
------------------------------------------------------------------

Example1 run command:  
```
sudo docker run -it --rm --name locust \
-e LOCUST_FILE_PATH=/opt/Locust-tests/ \
-e LOCUST_TARGET_HOST=http://ip/ \
-e LOCUST_LOCUSTFILE=locust-tests-new.py \
-e LOCUST_NUM_REQUEST=50 \
-e LOCUST_USERS=10 \
-e LOCUST_HATCH_RATE=1 \
-e LOCUST_REPORT=/opt/Locust-tests/report.txt \
-v /opt/Locust-tests:/opt/Locust-tests \
registry.gitlab.com/jamkit/locust-standalone
```  
------------------------------------------------------------------

Example2 run command:  

```
sudo docker run -it --rm --name locust \
-e LOCUST_RUN_TYPE=web \
-e LOCUST_FILE_PATH=/opt/Locust-tests/ \
-e LOCUST_TARGET_HOST=http://ip/ \
-e LOCUST_LOCUSTFILE=locust-tests-new.py \
-v /opt/Locust-tests:/opt/Locust-tests \
-p 8089:8089 \
registry.gitlab.com/jamkit/locust-standalone
```  
-------------------------------------------------------------------


After tests are done container exits and moves reports to your reports folder what u defined in launch options.  IF you chose to run with webUI you must download report manually using webUI.  

Video tutorials:  
[Locust-web](https://www.youtube.com/watch?v=Z2u9N_-gYsc)  
[Locust](https://www.youtube.com/watch?v=pd8NSgAAt0Y)


## Deployment diagram

### Locust-web container
![Locust-web](https://raw.githubusercontent.com/JAMK-IT/test-environments/master/images/locust-web-debloyment.png) 
