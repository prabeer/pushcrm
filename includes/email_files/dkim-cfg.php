<?
/***************************************************************************\
*  DKIM-CFG ($Id: dkim-cfg-dist.php,v 1.2 2008/09/30 10:21:52 evyncke Exp $)
*  
*  Copyright (c) 2008 
*  Eric Vyncke
*          
* This program is a free software distributed under GNU/GPL licence.
* See also the file GPL.html
*
* THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR 
* IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
* OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
* IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT,
* INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT
* NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
* DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
* THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
* (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF
*THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 ***************************************************************************/
 
// Uncomment the $open_SSL_pub and $open_SSL_priv variables and
// copy and paste the content of the public- and private-key files INCLUDING
// the first and last lines (those starting with ----)

$open_SSL_pub="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA3xHc88/DGbOtHZLyDwoW
u9RlXaR3ymlA6kFoqNNY2MTkcFmwGpI5oKLJhSGo/xH1GZ0bttqmB8/LBs2PN5qV
nVAZ04CbLr6F3xp9dcSa3jYW1OATueGAgEtJdPhLJhFAvWyfPZs3IS84Z47P2n19
pgzuUhestkqC2xztszmxJ9fpf/nsf1GqTmIfHuqJknOkQ9NYq//vjcmTOQ4WGfR4
9bkPq/uGrZ2qYlS7dawPYlMg2FPOdMZ39EhDJezdM3eMiMoq3ipnchammno7jGw8
NUbOQ6aleH2+bno5eVRQ7DHVRxFaGhVHib+eaZW8CRfXkHAsBtm/4zikkfBFVF8d
IwIDAQAB
-----END PUBLIC KEY-----" ;

$open_SSL_priv="-----BEGIN RSA PRIVATE KEY-----
MIIEpQIBAAKCAQEA3xHc88/DGbOtHZLyDwoWu9RlXaR3ymlA6kFoqNNY2MTkcFmw
GpI5oKLJhSGo/xH1GZ0bttqmB8/LBs2PN5qVnVAZ04CbLr6F3xp9dcSa3jYW1OAT
ueGAgEtJdPhLJhFAvWyfPZs3IS84Z47P2n19pgzuUhestkqC2xztszmxJ9fpf/ns
f1GqTmIfHuqJknOkQ9NYq//vjcmTOQ4WGfR49bkPq/uGrZ2qYlS7dawPYlMg2FPO
dMZ39EhDJezdM3eMiMoq3ipnchammno7jGw8NUbOQ6aleH2+bno5eVRQ7DHVRxFa
GhVHib+eaZW8CRfXkHAsBtm/4zikkfBFVF8dIwIDAQABAoIBAQDH2J8VJ3tpGVns
9us5ohY/7Mdrn59ajfWEaVk0dzRP8AWgyhlFlN9gFLdqOH/JFPN7IQ/lP/ojYXxI
+fxnGm0T5OFeZQeiVzpkaL0htyPwFJFb4eyKSYbwaYLD8naRAj/39MqtTNOVPVLR
JFb/LhJVo5wXm/I11odpen9SZEtcnxzrDeVECo4VGyODUnUPs56Y+/k4Wgxyr7Yr
n7331Ll/cQKS6BRmPovnX/rEVpNqKXt7aScY33NQwOKjEzkvhNctXUVu+3SF5JPH
dvGP0zWTKLoTekX1R5f69Far5ITPpAA8ZQp3BzYEYmiuKqDIXyeJ/Bvo6H7zN9gH
2N3nqiNhAoGBAPLNQUcQC21f4WyITcTgVsa894+SuH//V4vv/oJZEdESI5z2TCjJ
epXSQg0cBrDWfkpuSjgwvPz/ha8XOoV/0biSziLvoVbYIl5ekxHGpEL2ni9t00WJ
7E3VGJdysrBnMteQaxMs/pcQ58BVTubPxQUjCoxtmhJ1Cb4QWOpPZe6bAoGBAOsy
BkN/ejOM1uc2g/dgiC8aGyDiStv9R2ivQy00kKUZCV/2KNwxk8wmeK5ZSpNGNr2/
3jOa2nOET84koO+UMZoDlgtZWIEGiKiOu72aeRxDfQXJFXoB4qnRptRiXyz+PRsZ
VLRHEMFJUyZJ+prsvh/4r9VGph1dV0l/6/gWBXAZAoGAYvpBThLAVcnsPy4hZcx+
E24dDS4mgCc7LRScj853cN8QHYBZ85aOnlykCGwQXi5SNU1YfCeCIzCW8pVpidpd
R/ywg5VkE97vw8CR+4EanSGjwnnm0kYzSldAOxzKsxaepzl8LMj+z95YWxNrorO4
ASwTtMNJN5T2b8CCPqI3T1kCgYEAh3qGXyU0SDONqxwdAkdpyvAXxmZzxqrsEmI6
qPSJiYCVhOBwAv7P6x4SECRBL/qXF9BI96LwyO/jZJR22+qac+Qy7xClSZVw7N9j
R8GOl/hMMSP2qhQh875fgiG0P1+n5U8/GqWBAkXxjrG4mLtcfWAsMQeEMpAM8rqs
O3i74ykCgYEAnKwVpu22M2oBRa0+1MVjygbAWbvXv05SoBjM07rQaEFFLaGr8c1v
vWKPIIKGikdDoDXBEaWLnUUhGk2W8agAMvFmtJRSUWHMIp9vZuP1tbayuamhFvCF
bBz7N3eyTZ6PR4yMPVOyrt9fDWNWJ2VZDsK1tXtCbJA0inRZ77WUnms=
-----END RSA PRIVATE KEY-----" ;

// DKIM Configuration

// Domain of the signing entity (i.e. the email domain)
// This field is mandatory
$DKIM_d='www.weattach.com' ;  

// Default identity 
// Optional (can be left commented out), defaults to no user @$DKIM_d
//$DKIM_i='@example.com' ; 

// Selector, defines where the public key is stored in the DNS
//    $DKIM_s._domainkey.$DKIM_d
// Mandatory
$DKIM_s='php' ;

?>