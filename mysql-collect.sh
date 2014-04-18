#! /bin/sh
# mysql-collect.sh
# Store to text file then to MySQL Database
ifconfig eth1 up
tcpdump -i eth1 -n -q -e | grep IPv4 | awk -F "[:, >]" {'print $24 " " $27 " " $22'} | awk -F "[. ]" '{
                if ($11 == "")
                print "\""$1"."$2"."$3"."$4"\",\""$5"."$6"."$7"."$8"\","$9
                else
                print "\""$1"."$2"."$3"."$4"\",\""$6"."$7"."$8"."$9"\","$11
               }' > /var/collect-eth1.txt &
tail -f /var/collect-eth1.txt | awk '{print "use collection; INSERT INTO packets (source, destination, pack_size) VALUES ("$1");"}' | mysql -u root -pxxxxxx &
